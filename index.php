<?php require __DIR__ . '/data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets/img/s-favicon.png">
  <title>Sairam Portfolio</title>
  <meta name="description" content="Portfolio of <?= $me['name'] ?> – Website Developer">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="portfolio-loader" id="portfolioLoader" role="status" aria-label="Loading Sairam Portfolio">
  <div class="portfolio-loader__content">
    <p class="portfolio-loader__eyebrow">Welcome to</p>
    <h1><span>SAIRAM</span><strong>PORTFOLIO</strong></h1>
    <span class="portfolio-loader__line" aria-hidden="true"><i></i></span>
    <span class="portfolio-loader__caption">Design · Develop · Create</span>
  </div>
</div>

<button class="nav-toggle" id="navToggle" aria-label="Menu"><i class="bi bi-list"></i></button>

<!-- SIDEBAR -->
<header id="sidebar">
  <div class="profile">
    <label class="avatar-upload" for="profileImage" title="Click to choose a profile photo"><span class="avatar" id="avatarPreview"><span class="avatar-initials">PVS</span></span><input id="profileImage" type="file" accept="image/*" hidden></label>
    <h1><?= $me['name'] ?></h1>
    <div class="socials">
      <a href="<?= $me['linkedin'] ?>" target="_blank" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
      <a href="<?= $me['instagram'] ?>" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://wa.me/<?= $me['wa'] ?>" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
      <a href="mailto:<?= $me['email'] ?>" aria-label="Email"><i class="bi bi-envelope"></i></a>
    </div>
  </div>
  <nav id="navmenu">
    <a href="#hero" class="active"><i class="bi bi-house"></i> Home</a>
    <a href="#about"><i class="bi bi-person"></i> About</a>
    <a href="#resume"><i class="bi bi-file-earmark-text"></i> Resume</a>
    <a href="#projects"><i class="bi bi-images"></i> Projects</a>
    <a href="#services"><i class="bi bi-hdd-stack"></i> Services</a>
    <a href="#contact"><i class="bi bi-envelope"></i> Contact</a>
    <a href="#dashboard"><i class="bi bi-bar-chart-line"></i> Dashboard</a>
  </nav>
</header>

<main>
<!-- HERO -->
<section id="hero" class="hero">
  <canvas id="particles"></canvas>
  <div class="container position-relative" data-aos="fade-in">
    <p class="eyebrow">Hello, I'm</p>
    <h2><?= $me['name'] ?></h2>
    <p class="typed-line">I'm a <span id="typed" data-items='<?= json_encode($me['roles']) ?>'></span></p>
    <div class="mt-4 d-flex gap-3 flex-wrap">
      <a href="#projects" class="btn-gold">View Projects <i class="bi bi-arrow-right"></i></a>
      <a href="#contact" class="btn-outline-gold">Let's Talk</a>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="section">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>About</h2><p><?= $me['about'] ?></p></div>
    <div class="row gy-4 align-items-center">
      <div class="col-md-4" data-aos="fade-right"><div class="about-card"><i class="bi bi-code-square"></i><span>Website Developer</span></div></div>
      <div class="col-md-8 content" data-aos="fade-left">
        <h3>UI/UX Designer & Web Developer.</h3>
        <div class="row">
          <ul class="col-lg-6 info">
            <li><i class="bi bi-chevron-right"></i><strong>Email:</strong> <?= $me['email'] ?></li>
            <li><i class="bi bi-chevron-right"></i><strong>Phone:</strong> <?= $me['phone'] ?></li>
            <li><i class="bi bi-chevron-right"></i><strong>City:</strong> <?= $me['city'] ?></li>
          </ul>
          <ul class="col-lg-6 info">
            <li><i class="bi bi-chevron-right"></i><strong>Degree:</strong> B.Tech (CSE)</li>
            <li><i class="bi bi-chevron-right"></i><strong>Hobbies:</strong> Pencil Art, Cricket, Anime, Gaming</li>
            <li><i class="bi bi-chevron-right"></i><strong>Age:</strong> 26</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row g-3 mt-4 stats">
      <?php foreach ($stats as $s): ?>
        <div class="col-6 col-lg-3" data-aos="zoom-in"><div class="stat"><b data-count="<?= $s[0] ?>"><?= $s[0] ?></b><span><?= $s[1] ?></span></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SKILLS -->
<section id="skills" class="section alt">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Skills</h2><p>Languages, databases and tools I work with.</p></div>
    <div class="row gx-5 gy-3">
      <?php foreach ($skills as $s): ?>
      <div class="col-md-6" data-aos="fade-up">
        <div class="skill"><div class="d-flex justify-content-between"><span><?= $s[0] ?></span><em><?= $s[1] ?>%</em></div>
          <div class="bar"><i data-w="<?= $s[1] ?>"></i></div></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- RESUME -->
<section id="resume" class="section">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Resume</h2><p>My experience and education.</p></div>
    <div class="row gy-4">
      <div class="col-lg-6" data-aos="fade-up">
        <h3 class="resume-title">Experience</h3>
        <?php foreach ($experience as $e): ?>
        <div class="resume-item">
          <h4><?= $e['role'] ?></h4><h5><?= $e['date'] ?></h5>
          <p><em><?= $e['org'] ?></em></p>
          <ul><?php foreach ($e['points'] as $p) echo "<li>$p</li>"; ?></ul>
        </div>
        <?php endforeach; ?>
        <h3 class="resume-title mt-4">Summary</h3>
        <div class="resume-item"><h4><?= $me['name'] ?></h4>
          <p><em>Passionate about building clean, responsive websites and learning new technologies.</em></p>
          <ul><li><?= $me['city'] ?></li><li><?= $me['phone'] ?></li><li><?= $me['email'] ?></li></ul></div>
        <h3 class="resume-title mt-4">Achievements</h3>
        <div class="resume-item"><ul><?php foreach ($achievements as $item): ?><li><?= $item ?></li><?php endforeach; ?></ul></div>
        <h3 class="resume-title mt-4">Hobbies and Interests</h3>
        <div class="resume-item"><ul>
          <li>Pencil Art: Instagram Art Account – <a href="<?= $me['instagram'] ?>" target="_blank" rel="noopener">https://instagram.com/art_is_my_first_love</a></li>
          <?php foreach ($interests as $item): ?><li><?= $item ?></li><?php endforeach; ?>
        </ul></div>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Education</h3>
        <?php foreach ($education as $e): ?>
        <div class="resume-item"><h4><?= $e[0] ?></h4><h5><?= $e[2] ?></h5><p><em><?= $e[1] ?></em></p><p><?= $e[3] ?></p></div>
        <?php endforeach; ?>
        <h3 class="resume-title mt-4">Certifications & Publications</h3>
        <div class="resume-item"><ul><?php foreach ($certs as $c) echo "<li>$c</li>"; ?></ul></div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECTS -->
<section id="projects" class="section alt">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Projects</h2><p>Selected academic and professional work.</p></div>
    <div class="filters" data-aos="fade-up">
      <button class="active" data-f="*">All</button><button data-f="major">Major</button>
      <button data-f="web">Web</button><button data-f="core">Core Java</button><button data-f="design">Design</button>
    </div>
    <div class="row g-4" id="projGrid">
      <?php foreach ($projects as $p): ?>
      <div class="col-md-6 col-xl-4 proj" data-cat="<?= $p[1] ?>" data-aos="zoom-in">
        <div class="proj-card"><span class="tag"><?= $p[2] ?></span><h4><?= $p[0] ?></h4><p><?= $p[3] ?></p></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services" class="section">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Services</h2><p>Tap a service to chat with me on WhatsApp.</p></div>
    <div class="row g-4">
      <?php foreach ($services as $i => $s): ?>
      <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $i * 50 ?>">
        <a class="service" href="https://wa.me/<?= $me['wa'] ?>?text=<?= urlencode('Hi Sairam, I am interested in ' . $s[1]) ?>" target="_blank">
          <i class="bi <?= $s[0] ?>"></i><h4><?= $s[1] ?></h4><p><?= $s[2] ?></p></a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="section alt">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Contact</h2><p>Have a project or opportunity? Let's talk.</p></div>
    <div class="row gy-4">
      <div class="col-lg-5" data-aos="fade-right">
        <div class="info-box"><i class="bi bi-geo-alt"></i><div><h5>Address</h5><p><?= $me['city'] ?></p></div></div>
        <div class="info-box"><i class="bi bi-telephone"></i><div><h5>Call</h5><p><?= $me['phone'] ?></p></div></div>
        <div class="info-box"><i class="bi bi-envelope"></i><div><h5>Email</h5><p><?= $me['email'] ?></p></div></div>
      </div>
      <div class="col-lg-7" data-aos="fade-left">
        <form id="contactForm" class="contact-form" action="contact.php" method="post">
          <div class="row g-3">
            <div class="col-md-6"><input class="form-control" name="name" placeholder="Your Name" required></div>
            <div class="col-md-6"><input class="form-control" type="email" name="email" placeholder="Your Email" required></div>
            <div class="col-12"><input class="form-control" name="subject" placeholder="Subject" required></div>
            <div class="col-12"><textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea></div>
            <div class="col-12"><button class="btn-gold" type="submit">Send Message <i class="bi bi-send"></i></button>
              <span id="formMsg" class="ms-3"></span></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- PERFORMANCE DASHBOARD -->
<section id="dashboard" class="section dashboard-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up"><h2>Performance Dashboard</h2><p>A quick view of my skills, projects and professional journey.</p></div>
    <div class="dashboard-grid">
      <article class="dashboard-card"><div class="dashboard-card-head"><i class="bi bi-bar-chart-line-fill"></i><h3>Skill Overview</h3></div>
        <?php foreach ($skills as $s): ?><div class="dashboard-skill"><div><span><?= $s[0] ?></span><b><?= $s[1] ?>%</b></div><div class="dashboard-track"><i style="--level:<?= $s[1] ?>%"></i></div></div><?php endforeach; ?>
      </article>
      <article class="dashboard-card dashboard-summary"><div class="dashboard-card-head"><i class="bi bi-trophy-fill"></i><h3>Career Snapshot</h3></div>
        <div class="dashboard-metrics"><div><b>5+</b><span>Months internship</span></div><div><b>4</b><span>Featured projects</span></div><div><b>8.03</b><span>B.Tech CGPA</span></div><div><b>8+</b><span>Certifications</span></div></div>
        <p>Focused on responsive web experiences, useful products and continuous learning.</p>
      </article>
    </div>
  </div>
</section>

<footer class="footer">© <?= date('Y') ?> <strong><?= $me['name'] ?></strong> · Built with <i class="bi bi-heart-fill"></i></footer>
</main>

<!-- FLOATING WHATSAPP + CHATBOT -->
<div class="float-wrap">
  <a class="wa-btn" href="https://wa.me/<?= $me['wa'] ?>" target="_blank" aria-label="WhatsApp"><span class="wa-label">Chat with us</span><i class="bi bi-whatsapp"></i></a>
  <button class="bot-btn" id="botBtn" aria-label="Chat"><i class="bi bi-chat-dots-fill"></i><b class="dot"></b></button>
</div>

<div class="chatbot" id="chatbot">
  <div class="cb-head">
    <div class="cb-logo"><i class="bi bi-stars"></i></div>
    <div><h6><?= $me['name'] ?> – Assistant</h6><small><i class="live"></i> Online • Creative &amp; Digital Solutions</small></div>
  </div>
  <div class="cb-body">
    <div class="cb-msg">Hi 👋 Welcome! Choose a service to see what I can build for you.</div>
    <p class="cb-q">Choose a service</p>
    <div class="cb-grid">
      <?php foreach ($services as $i => $s): ?>
        <button class="cb-opt <?= $i === 0 ? 'on' : '' ?>" data-svc="<?= $s[1] ?>"><i class="bi <?= $s[0] ?>"></i><span><b><?= $s[1] ?></b><small><?= $s[2] ?></small></span></button>
      <?php endforeach; ?>
    </div>
    <div class="cb-detail" id="cbDetail" aria-live="polite"><p class="cb-q">How can I help you today?</p><p class="cb-detail-hint">Select a service above to see details.</p></div>
  </div>
  <div class="cb-foot">
    <a href="tel:<?= str_replace(' ', '', $me['phone']) ?>" class="cb-call"><i class="bi bi-telephone-fill"></i> Call Us</a>
    <a href="mailto:<?= $me['email'] ?>" class="cb-mail"><i class="bi bi-envelope-fill"></i> Mail Us</a>
  </div>
</div>

<button id="toTop" aria-label="Top"><i class="bi bi-arrow-up-short"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>window.WA = "<?= $me['wa'] ?>";</script>
<script src="assets/js/main.js"></script>
</body>
</html>
