(function () {
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  // Reveal the portfolio once the page has loaded; the timeout is a fallback for cached events.
  const loader = $('#portfolioLoader');
  if (loader) {
    const hideLoader = () => {
      loader.classList.add('is-hidden');
      window.setTimeout(() => loader.remove(), 800);
    };
    if (document.readyState === 'complete') window.setTimeout(hideLoader, 1500);
    else window.addEventListener('load', () => window.setTimeout(hideLoader, 1500), { once: true });
  }

  if (window.AOS) AOS.init({ duration: 800, easing: 'ease-in-out', once: false, mirror: false });

  // Typed text
  const t = $('#typed');
  if (t && window.Typed) { try { new Typed('#typed', { strings: JSON.parse(t.dataset.items), typeSpeed: 60, backSpeed: 30, backDelay: 1800, loop: true }); } catch (_) { t.textContent = 'Java Developer'; } }

  // Mobile sidebar
  const sb = $('#sidebar'), tg = $('#navToggle');
  if (tg && sb) tg.addEventListener('click', () => {
    sb.classList.toggle('open');
    tg.innerHTML = sb.classList.contains('open') ? '<i class="bi bi-x"></i>' : '<i class="bi bi-list"></i>';
  });
  $$('#navmenu a').forEach(a => a.addEventListener('click', () => {
    if (sb) sb.classList.remove('open');
    if (tg) tg.innerHTML = '<i class="bi bi-list"></i>';
    const target = $(a.getAttribute('href'));
    if (target) target.querySelectorAll('[data-aos]').forEach(el => {
      el.classList.remove('aos-animate');
      void el.offsetWidth;
      el.classList.add('aos-animate');
    });
  }));

  // Scroll spy + back-to-top
  const links = $$('#navmenu a'), secs = links.map(a => $(a.getAttribute('href')));
  function onScroll() {
    const y = window.scrollY + window.innerHeight / 3;
    secs.forEach((s, i) => { if (s && s.offsetTop <= y && s.offsetTop + s.offsetHeight > y) links.forEach((l, j) => l.classList.toggle('active', i === j)); });
    $('#toTop').classList.toggle('show', window.scrollY > 300);
  }
  addEventListener('scroll', onScroll); onScroll();
  $('#toTop').addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));

  // Reveal: skill bars + counters
  const io = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target; io.unobserve(el);
    if (el.dataset.w) el.style.width = el.dataset.w + '%';
    if (el.dataset.count) {
      const raw = el.dataset.count, end = parseFloat(raw), suf = raw.replace(/[0-9.]/g, ''), dec = raw.includes('.') ? 2 : 0;
      let n = 0; const step = end / 50;
      const id = setInterval(() => { n += step; if (n >= end) { n = end; clearInterval(id); } el.textContent = n.toFixed(dec) + suf; }, 30);
    }
  }), { threshold: .4 });
  $$('[data-w],[data-count]').forEach(el => io.observe(el));

  // Project filter
  $$('.filters button').forEach(b => b.addEventListener('click', () => {
    $$('.filters button').forEach(x => x.classList.remove('active')); b.classList.add('active');
    $$('.proj').forEach(p => p.classList.toggle('hide', b.dataset.f !== '*' && p.dataset.cat !== b.dataset.f));
  }));

  // Hero particles
  const cv = $('#particles'), cx = cv.getContext('2d'); let pts = [];
  function size() { cv.width = cv.offsetWidth; cv.height = cv.offsetHeight; pts = Array.from({ length: Math.min(70, cv.width / 14) }, () => ({ x: Math.random() * cv.width, y: Math.random() * cv.height, vx: (Math.random() - .5) * .5, vy: (Math.random() - .5) * .5, r: Math.random() * 2 + 1 })); }
  function draw() {
    cx.clearRect(0, 0, cv.width, cv.height);
    pts.forEach((p, i) => {
      p.x += p.vx; p.y += p.vy;
      if (p.x < 0 || p.x > cv.width) p.vx *= -1; if (p.y < 0 || p.y > cv.height) p.vy *= -1;
      cx.beginPath(); cx.arc(p.x, p.y, p.r, 0, 7); cx.fillStyle = 'rgba(232,201,120,.7)'; cx.fill();
      for (let j = i + 1; j < pts.length; j++) { const d = Math.hypot(p.x - pts[j].x, p.y - pts[j].y); if (d < 110) { cx.strokeStyle = 'rgba(232,201,120,' + (.25 - d / 440) + ')'; cx.beginPath(); cx.moveTo(p.x, p.y); cx.lineTo(pts[j].x, pts[j].y); cx.stroke(); } }
    });
    requestAnimationFrame(draw);
  }
  if (cv && cx) { size(); draw(); addEventListener('resize', size); }

  // Chatbot
  const bot = $('#chatbot'), btn = $('#botBtn');
  if (btn && bot) {
    btn.setAttribute('aria-expanded', 'false');
    bot.setAttribute('aria-hidden', 'true');
    btn.addEventListener('click', () => {
      const isOpen = bot.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(isOpen));
      bot.setAttribute('aria-hidden', String(!isOpen));
      btn.innerHTML = isOpen ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-chat-dots-fill"></i><b class="dot"></b>';
    });
  }
  const serviceInfo = {
    'Website': { title: 'Website Design & Development', intro: 'I create professional, responsive websites that give your brand a strong digital presence.', points: ['Business websites', 'E-commerce websites', 'Responsive UI/UX', 'Custom development'] },
    'Mobile App': { title: 'Mobile App Development', intro: 'Modern mobile experiences designed around your users and business goals.', points: ['App planning and interface design', 'Responsive user experiences', 'Feature-focused development', 'Ongoing improvements'] },
    'Software': { title: 'Custom Software Solutions', intro: 'Practical software built to simplify workflows and solve real business needs.', points: ['Requirement planning', 'Custom tools and automation', 'Reliable, maintainable code', 'Testing and refinement'] },
    'Social Media': { title: 'Social Media Content & Growth', intro: 'Consistent, creative social content to help your brand connect with its audience.', points: ['Content planning', 'Creative post designs', 'Brand consistency', 'Audience growth support'] },
    'SEO': { title: 'Search Engine Optimization', intro: 'Improve your website structure and content so people can find your business more easily.', points: ['On-page SEO basics', 'Keyword-focused content', 'Performance improvements', 'Search visibility review'] },
    'Graphic Design': { title: 'Graphic Design & Visuals', intro: 'Clear, memorable visual assets that communicate your brand message.', points: ['Social media creatives', 'Marketing graphics', 'Digital assets', 'Consistent visual style'] },
    'Video Editing': { title: 'Video Editing', intro: 'Engaging edits for social media, reels and brand storytelling.', points: ['Short-form reels', 'Clean cuts and transitions', 'Titles and captions', 'Platform-ready exports'] },
    'Branding': { title: 'Brand Identity & Strategy', intro: 'A cohesive identity that helps your business look recognizable and professional.', points: ['Visual direction', 'Color and typography', 'Brand assets', 'Consistent identity'] }
  };
  const detail = $('#cbDetail'), chatBody = $('.cb-body', bot);
  let typingRun = 0;
  $$('.cb-opt').forEach(o => o.addEventListener('click', () => {
    $$('.cb-opt').forEach(x => x.classList.remove('on')); o.classList.add('on');
    if (!detail) return;
    const info = serviceInfo[o.dataset.svc]; if (!info) return;
    const run = ++typingRun;
    detail.innerHTML = '<h3 class="cb-detail-title"></h3><p class="cb-detail-copy"></p><ul class="cb-detail-list">' + info.points.map(() => '<li><i class="bi bi-check-circle-fill"></i><span></span></li>').join('') + '</ul><a class="cb-more is-hidden" target="_blank" rel="noopener" href="https://wa.me/' + encodeURIComponent(window.WA || '') + '?text=' + encodeURIComponent('Hi Sairam, I would like to know more about ' + o.dataset.svc) + '"><i class="bi bi-arrow-right-circle-fill"></i> More Information</a>';
    const sequence = [
      [$('.cb-detail-title', detail), info.title, 24],
      [$('.cb-detail-copy', detail), info.intro, 12],
      ...$$('.cb-detail-list span', detail).map((el, i) => [el, info.points[i], 12])
    ];
    const more = $('.cb-more', detail);
    const typeStep = index => {
      if (run !== typingRun) return;
      if (index >= sequence.length) { more.classList.remove('is-hidden'); return; }
      const [el, text, speed] = sequence[index]; let pos = 0; el.textContent = '';
      const write = () => {
        if (run !== typingRun) return;
        el.textContent = text.slice(0, ++pos);
        if (pos < text.length) setTimeout(write, speed);
        else setTimeout(() => typeStep(index + 1), 110);
      };
      if (text.length) write(); else typeStep(index + 1);
    };
    if (detail) detail.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    typeStep(0);
  }));

  // Device image picker with local preview; nothing is uploaded to a server.
  const imageInput = $('#profileImage'), avatar = $('#avatarPreview');
  if (imageInput && avatar) {
    const setAvatarPhoto = photo => { avatar.classList.add('avatar-has-photo'); avatar.innerHTML = '<img alt="Profile photo" src="' + photo + '">'; };
    const savedPhoto = localStorage.getItem('portfolioProfilePhoto');
    if (savedPhoto) setAvatarPhoto(savedPhoto);
    imageInput.addEventListener('change', () => {
      const file = imageInput.files && imageInput.files[0];
      if (!file || !file.type.startsWith('image/')) return;
      const reader = new FileReader();
      reader.onload = () => {
        const source = new Image();
        source.onload = () => {
          const canvas = document.createElement('canvas'), scale = Math.min(1, 640 / Math.max(source.width, source.height));
          canvas.width = Math.round(source.width * scale); canvas.height = Math.round(source.height * scale);
          canvas.getContext('2d').drawImage(source, 0, 0, canvas.width, canvas.height);
          const photo = canvas.toDataURL('image/jpeg', .82);
          setAvatarPhoto(photo);
          try { localStorage.setItem('portfolioProfilePhoto', photo); } catch (_) {}
        };
        source.src = reader.result;
      };
      reader.readAsDataURL(file);
    });
  }

  // Contact form
  const f = $('#contactForm'), msg = $('#formMsg');
  if (f && msg) f.addEventListener('submit', async e => {
    e.preventDefault(); msg.textContent = 'Sending...';
    try {
      const r = await fetch(f.action, { method: 'POST', body: new FormData(f) }), j = await r.json();
      msg.textContent = j.message; msg.style.color = j.ok ? '#006B4A' : '#b00020'; if (j.ok) f.reset();
    } catch (_) { msg.textContent = 'Something went wrong. Please try again.'; msg.style.color = '#b00020'; }
  });
})();
