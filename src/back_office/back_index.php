<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/font.css">
</head>
<body>
<!--Tabs navigation-->
<ul
  class="me-4 flex list-none flex-col flex-wrap ps-0"
  role="tablist"
  data-twe-nav-ref>
  <li role="presentation" class="flex-grow text-center">
    <a
      href="#tabs-home03"
      class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
      data-twe-toggle="pill"
      data-twe-target="#tabs-home03"
      data-twe-nav-active
      role="tab"
      aria-controls="tabs-home03"
      aria-selected="true"
      >Home</a
    >
  </li>
  <li role="presentation" class="flex-grow text-center">
    <a
      href="#tabs-profile03"
      class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
      data-twe-toggle="pill"
      data-twe-target="#tabs-profile03"
      role="tab"
      aria-controls="tabs-profile03"
      aria-selected="false"
      >Profile</a
    >
  </li>
  <li role="presentation" class="flex-grow text-center">
    <a
      href="#tabs-messages03"
      class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
      data-twe-toggle="pill"
      data-twe-target="#tabs-messages03"
      role="tab"
      aria-controls="tabs-messages03"
      aria-selected="false"
      >Messages</a
    >
  </li>
  <li role="presentation" class="flex-grow text-center">
    <a
      href="#tabs-contact03"
      class="disabled pointer-events-none my-2 block border-x-0 border-b-2 border-t-0 border-transparent bg-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-400 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent dark:text-neutral-600"
      data-twe-toggle="pill"
      data-twe-target="#tabs-contact03"
      role="tab"
      aria-controls="tabs-contact03"
      aria-selected="false"
      >Contact</a
    >
  </li>
</ul>

<!--Tabs content-->
<div class="my-2">
  <div
    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
    id="tabs-home03"
    role="tabpanel"
    aria-labelledby="tabs-home-tab03"
    data-twe-tab-active>
    Tab 1 content
  </div>
  <div
    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
    id="tabs-profile03"
    role="tabpanel"
    aria-labelledby="tabs-profile-tab03">
    Tab 2 content
  </div>
  <div
    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
    id="tabs-messages03"
    role="tabpanel"
    aria-labelledby="tabs-profile-tab03">
    Tab 3 content
  </div>
  <div
    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
    id="tabs-contact03"
    role="tabpanel"
    aria-labelledby="tabs-contact-tab03">
    Tab 4 content
  </div>
</div>
</body>
</html>

<script>
import {
  Tab,
  initTWE,
} from "tw-elements";

initTWE({ Tab });</script>