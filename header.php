<?php include 'templates/partials/document-open.php';

?>

<header class="absolute inset-x-0 top-0 z-50 flex h-16 border-b border-gray-900/10">
  <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
    <div class="flex flex-1 items-center gap-x-6">
      <!-- Mobile menu, show/hide based on menu open state. -->
      <button hx-get="templates/views/mobileMenu.php" hx-target="body" hx-swap="beforeend" type="button"
              class="-m-3 p-3 md:hidden">
        <span class="sr-only">Open main menu</span>
        <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z"
                clip-rule="evenodd"/>
        </svg>
      </button>
      <img class="h-10 w-auto" src="assets/img/DePortfolioNarrow.png" alt="DePortfolio">
    </div>
    <nav class="hidden md:flex md:gap-x-11 md:text-sm md:font-semibold md:leading-6 md:text-gray-700">
      <? if ($address): ?>
        <a href="dashboard.php?address=<?= $address; ?>">Dashboard</a>
      <? else: ?>
        <a href="dashboard.php">Dashboard</a>
      <? endif; ?>
      <a href="#">NFT</a>
      <a href="#">Coins</a>
    </nav>

    <div class="flex flex-1 items-center justify-end gap-x-8">
      <? /*
      <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
        <span class="sr-only">View notifications</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
        </svg>
      </button>
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your profile</span>
        <img class="h-8 w-8 rounded-full bg-gray-800"
             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
             alt="">
      </a>
  */ ?>
    </div>

  </div>


</header>