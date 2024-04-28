<html lang="en" data-bs-theme="auto">
  <head><script src="/<?= ASSETS_PATH ?>js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Calculator</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/<?= ASSETS_PATH ?>/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/<?= ASSETS_PATH ?>styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/<?= ASSETS_PATH ?>sidebars.css" rel="stylesheet">
    <link href="/<?= ASSETS_PATH ?>checkout.css" rel="stylesheet">
  </head>
  <body>


<main class="d-flex flex-nowrap">

  <div class="flex-shrink-0 p-3" style="width: 280px;">
    <a href="/dashboard" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Your Operations</span><br/>
    </a>

    <p><span class="fs-5 fw-semibold" style="font-size: 15px !important; color:#00FF7F;">Your Balance: <?= $params['user_profile']['balance'] ?></span></p>
    
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Operations
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/dashboard/addition" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Addition</a></li>
            <li><a href="/dashboard/substraction" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Substraction</a></li>
            <li><a href="/dashboard/multiplication" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Multiplication</a></li>
            <li><a href="/dashboard/division" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Division</a></li>
            <li><a href="/dashboard/squareRoot" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Square Root</a></li>
            <li><a href="/dashboard/randomString" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Random String</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>

      <a href="/logout" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold" style="font-size: 15px !important; text-align: center !important; color: red !important;">Logout</span>
      </a>

    </ul>
  </div>

  <div class="b-example-divider b-example-vr" style="width: 0.5rem;"></div>
  <div id="section-operation">
      <?php 
          if (!empty($params['section'])) {
              require_once($params['section']);
          }
      ?>
  </div>
</main>
<script src="/<?= ASSETS_PATH ?>dist/js/bootstrap.bundle.min.js"></script>

    <script src="/<?= ASSETS_PATH ?>js/sidebars.js"></script></body>
    <script src="/<?= ASSETS_PATH ?>js/checkout.js"></script></body>
</html>
