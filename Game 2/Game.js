// Game.js — Final (uses your MP3 files for bg & game over, beep for jump/hit)
(() => {
  // DOM
  const player = document.getElementById('player');
  const gameArea = document.getElementById('gameArea');
  const scoreEl = document.getElementById('score');
  const livesEl = document.getElementById('lives');
  const startBtn = document.getElementById('startBtn');
  const startOverlay = document.getElementById('startOverlay');
  const jumpBtn = document.getElementById('jumpBtn');
  const cloudsContainer = document.getElementById('clouds');
  const particlesRoot = document.getElementById('particles');
  const musicToggle = document.getElementById('musicToggle');
  const bgAudio = document.getElementById('bgAudio');
  const gameOverAudio = document.getElementById('gameOverAudio');
  const charOpts = document.querySelectorAll('.char.opt');

  // Game state
  let running = false;
  let score = 0;
  let lives = 3;
  let obstacles = [];
  let y = 0;            // px above ground
  let vy = 0;           // px/s
  let lastTime = 0;
  let spawnTimer = 0;
  let speed = 220;
  const BASE_SPEED = 220;

  // Physics constants (tweakable)
  const GRAVITY = -2100; // px/s^2 (negative)
  const JUMP_V = 780;    // px/s (first jump)
  const DOUBLE_V = 720;  // px/s (double jump)

  // Audio (WebAudio for sfx beep)
  let audioCtx = null;
  function initAudioCtx(){
    try { audioCtx = new (window.AudioContext || window.webkitAudioContext)(); }
    catch(e){ audioCtx = null; }
  }

  function sfxBeep(freq=600, type='square', duration=0.16, vol=0.06){
    if(!audioCtx) return;
    const o = audioCtx.createOscillator();
    const g = audioCtx.createGain();
    o.type = type; o.frequency.value = freq;
    g.gain.value = vol;
    o.connect(g); g.connect(audioCtx.destination);
    o.start();
    g.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + duration);
    o.stop(audioCtx.currentTime + duration + 0.02);
  }

  function sfxJump(){ sfxBeep(650,'square',0.14,0.06); }
  function sfxHit(){ sfxBeep(160,'sawtooth',0.28,0.10); }

  // UI helpers
  function renderLives(){
    livesEl.innerHTML = '';
    for(let i=0;i<3;i++){
      const sp = document.createElement('span');
      sp.className = 'heart ' + (i < lives ? 'full' : 'empty');
      livesEl.appendChild(sp);
    }
  }

  function spawnParticles(x,y,color='#ffd54f',count=10){
    for(let i=0;i<count;i++){
      const p = document.createElement('div');
      p.className = 'particle';
      p.style.left = x + (Math.random()*20-10) + 'px';
      p.style.top = y + (Math.random()*20-10) + 'px';
      p.style.background = color;
      const ang = Math.random()*Math.PI*2;
      const spd = 40 + Math.random()*160;
      p.style.setProperty('--vx', Math.cos(ang)*spd + 'px');
      p.style.setProperty('--vy', Math.sin(ang)*spd + 'px');
      particlesRoot.appendChild(p);
      setTimeout(()=> p.remove(), 900 + Math.random()*300);
    }
  }

  function spawnCloud(){
    const c = document.createElement('div');
    c.className = 'cloud';
    const size = 60 + Math.random()*80;
    c.style.width = size + 'px';
    c.style.height = (size*0.6) + 'px';
    c.style.top = 10 + Math.random()*120 + 'px';
    cloudsContainer.appendChild(c);
    setTimeout(()=> c.remove(), 20000 + Math.random()*15000);
  }

  // obstacles
  function spawnObstacleOnce(){
    const el = document.createElement('div');
    const type = Math.random() < 0.62 ? 'short' : 'tall';
    el.className = 'obstacle ' + type;
    gameArea.appendChild(el);
    const w = el.getBoundingClientRect().width || (type==='short'?46:52);
    obstacles.push({ el, x: gameArea.clientWidth + 80, width: w, type, passed:false });
  }

  // collision helper
  function coll(a,b){ return !(a.right < b.left || a.left > b.right || a.bottom < b.top || a.top > b.bottom); }

  // jump input (single/double)
  let canDouble = false, doubleUsed = false;
  function handleJumpInput(){
    if(!running) return;
    if (y <= 0.001){
      vy = JUMP_V;
      canDouble = true; doubleUsed = false;
      sfxJump();
      spawnParticles(player.offsetLeft + 18, gameArea.clientHeight - (50 + y) - 20, '#fff59d', 10);
    } else if (canDouble && !doubleUsed){
      vy = DOUBLE_V;
      doubleUsed = true;
      sfxJump();
      spawnParticles(player.offsetLeft + 18, gameArea.clientHeight - (50 + y) - 40, '#ffd54f', 8);
    }
  }

  // listeners
  jumpBtn?.addEventListener('click', ()=> handleJumpInput());
  jumpBtn?.addEventListener('dblclick', e=> { e.stopPropagation(); handleJumpInput(); });
  gameArea.addEventListener('click', ()=> handleJumpInput());
  document.addEventListener('keydown', e => { if(e.code === 'Space') handleJumpInput(); });

  // touch double tap
  let tapCount=0, tapTimer=null;
  jumpBtn?.addEventListener('touchend', ()=>{
    tapCount++;
    if(tapTimer) clearTimeout(tapTimer);
    tapTimer = setTimeout(()=>{
      if(tapCount === 1) handleJumpInput();
      if(tapCount >= 2) handleJumpInput();
      tapCount = 0;
    }, 260);
  });

  // lose life
  function loseLife(){
    lives = Math.max(0, lives - 1);
    renderLives();
    sfxHit();
    player.classList.add('hit');
    setTimeout(()=> player.classList.remove('hit'), 340);
    spawnParticles(player.offsetLeft+10, gameArea.clientHeight - (50 + y) - 20, '#ff8a80', 16);
    if(lives <= 0) endGame();
  }

  function endGame(){
    running = false;
    // stop bg audio if playing
    try { const bg = document.getElementById('bgAudio'); if(bg && !bg.paused) bg.pause(); } catch(e){}
    // play provided game over file
    try { const go = document.getElementById('gameOverAudio'); if(go) { go.currentTime = 0; go.play(); } } catch(e){}
    startOverlay.style.display = 'flex';
    startOverlay.querySelector('h1').textContent = 'Game Over';
    startBtn.textContent = 'Main Lagi';
  }

  // main loop
  let lastTs = 0;
  function loop(ts){
    if(!running) return;
    if(!lastTs) lastTs = ts;
    const dt = Math.min(40, ts - lastTs) / 1000;
    lastTs = ts;

    // score is only awarded when passing obstacle (see below)
    // speed scaling
    speed = BASE_SPEED + Math.min(300, score * 0.45);

    // spawn clouds
    if(Math.random() < 0.015) spawnCloud();

    // spawn obstacles by timer
    spawnTimer += dt;
    const spawnInterval = Math.max(0.6, 1.1 - Math.min(0.6, score / 1000));
    if(spawnTimer > spawnInterval){
      spawnObstacleOnce();
      spawnTimer = 0;
    }

    // update obstacles
    for(let i = obstacles.length - 1; i >= 0; i--){
      const ob = obstacles[i];
      ob.x -= speed * dt;
      ob.el.style.left = ob.x + 'px';

      // award score when obstacle passed player (only once)
      const playerLeft = player.getBoundingClientRect().left;
      if(!ob.passed && ob.x + ob.width < playerLeft){
        ob.passed = true;
        score++;
        scoreEl.textContent = score;
        // optional small sound for score (beep): sfxBeep(880,'sine',0.08,0.04);
      }

      // remove offscreen
      if(ob.x + ob.width < -80){
        ob.el.remove();
        obstacles.splice(i,1);
        continue;
      }

      // collision
      const pRect = player.getBoundingClientRect();
      const oRect = ob.el.getBoundingClientRect();
      if(coll(pRect, oRect)){
        ob.el.remove();
        obstacles.splice(i,1);
        loseLife();
      }
    }

    // physics integrate: vy += gravity*dt; y += vy*dt
    vy += GRAVITY * dt; // gravity negative
    y += vy * dt;
    if(y < 0){ y = 0; vy = 0; canDouble = false; doubleUsed = false; }

    player.style.bottom = (50 + y) + 'px';

    requestAnimationFrame(loop);
  }

  // start / restart function
  window.startGame = function(){
    if(!audioCtx) initAudioCtx();
    // start background audio (provided file)
    try {
      const bg = document.getElementById('bgAudio');
      if(bg){ bg.currentTime = 0; bg.volume = 0.35; bg.play().catch(()=>{}); }
    } catch(e){}

    // reset
    obstacles.forEach(o => { try{ o.el.remove(); } catch(e){} });
    obstacles = [];
    score = 0; scoreEl.textContent = 0;
    lives = 3; renderLives();
    y = 0; vy = 0; lastTs = 0; spawnTimer = 0;
    speed = BASE_SPEED;
    startOverlay.style.display = 'none';
    player.className = 'player ' + (charOpts[0]?.dataset?.char || 'character-a');
    running = true;
    // pre-clouds
    for(let i=0;i<3;i++) setTimeout(spawnCloud, i*700);
    setTimeout(()=> spawnObstacleOnce(), 700);
    requestAnimationFrame(loop);
  };

  // start button listener
  startBtn.addEventListener('click', ()=> { window.startGame(); });

  // music toggle
  if(musicToggle){
    musicToggle.addEventListener('click', ()=>{
      const bg = document.getElementById('bgAudio');
      if(!bg) return;
      if(bg.paused){ bg.play(); musicToggle.textContent = '🔊 Musik: ON'; }
      else { bg.pause(); musicToggle.textContent = '🔇 Musik: OFF'; }
    });
  }

  // char select
  charOpts.forEach(opt => {
    opt.addEventListener('click', ()=>{
      charOpts.forEach(o => o.classList.remove('selected'));
      opt.classList.add('selected');
      const cls = opt.dataset.char;
      player.className = 'player ' + cls;
    });
  });

  // UI init
  renderLives();
  for(let i=0;i<3;i++) setTimeout(spawnCloud, i*900);

  // unlock audio on first user gesture
  document.addEventListener('pointerdown', () => {
    if(!audioCtx) initAudioCtx();
    if(audioCtx && audioCtx.state === 'suspended') audioCtx.resume();
  }, { once: true });

})();