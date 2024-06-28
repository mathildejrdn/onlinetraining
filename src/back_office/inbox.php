
<main class="flex w-full h-full shadow-lg rounded-3xl">
  <section class="flex flex-col w-2/12 bg-white rounded-l-3xl">
    <div class="w-16 mx-auto mt-12 mb-20 p-4 bg-indigo-600 rounded-2xl text-white">
      <a href="./envoi.php">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
          d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
      </svg>
      </a>
    </div>
    <nav class="relative flex flex-col py-4 items-center">
  <!-- ici s'affichent les msg non lus -->
    <a href="#" class="relative w-16 p-4 bg-purple-100 text-purple-900 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
        </svg>
        <span
          class="absolute -top-2 -right-2 bg-red-600 h-6 w-6 p-2 flex justify-center items-center text-white rounded-full">3</span>
      </a>
      <!-- ici le bouton de supression -->
      <a href="#" class="w-16 p-4 border text-gray-700 rounded-2xl mb-24">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </a>
    
    </nav>
  </section>
  <section class="flex flex-col pt-3 w-4/12 bg-gray-50 h-full overflow-y-scroll">

  <!--   bloc des messages à gauche -->
    <ul class="mt-6" id="message-list">
      <li class="py-5 border-b px-3 transition hover:bg-indigo-100" data-message="message-1"> <!-- message 1 -->
        <a href="#" class="flex justify-between items-center">
          <h3 class="text-lg font-semibold">Akhil Gautam</h3> <!-- nom de l'utilisateur ayant envoyé le msg --> 
          <p class="text-md text-gray-400">23m ago</p> <!-- la date -->
        </a>
        <div class="text-md italic text-gray-400">I have a problem to solve
        </div> <!-- titre du message -->
       </li> <!-- fin du li -->
      <li class="py-5 border-b px-3 transition hover:bg-indigo-100" data-message="message-2">
        <a href="#" class="flex justify-between items-center">
          <h3 class="text-lg font-semibold">Binod Chaudhary</h3>
          <p class="text-md text-gray-400">45m ago</p>
        </a>
        <div class="text-md italic text-gray-400">Please call me back</div>
      </li>
      <li class="py-5 border-b px-3 transition hover:bg-indigo-100" data-message="message-3">
        <a href="#" class="flex justify-between items-center">
          <h3 class="text-lg font-semibold">Sophie Mark</h3>
          <p class="text-md text-gray-400">4h ago</p>
        </a>
        <div class="text-md italic text-gray-400">Here are the documents you asked</div>
      </li>
    </ul>
  </section>
  <section class="w-6/12 bg-gray-200 p-8 rounded-r-3xl overflow-y-scroll"> <!-- ici les messages cachés sur le côté en JS, le code se répète par rapport au dessus et affiche le contenu du mail -->
    <div id="message-1" class="message-content hidden">
      <h1 class="text-2xl font-bold">Message from Akhil Gautam</h1>
      <p class="mt-4">I have a problem to solve
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div id="message-2" class="message-content hidden">
      <h1 class="text-2xl font-bold">Message from Binod Chaudhary</h1>
      <p class="mt-4">Please call me back</p>
    </div>
    <div id="message-3" class="message-content hidden">
      <h1 class="text-2xl font-bold">Message from Sophie Mark</h1>
      <p class="mt-4">Here are the documents you asked</p>
    </div>
  </section>
</main>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const messageList = document.getElementById('message-list');
    const messageContents = document.querySelectorAll('.message-content');
    
    messageList.addEventListener('click', function (e) {
      const target = e.target.closest('li');
      if (!target) return;
      
      // Hide all message contents
      messageContents.forEach(content => content.classList.add('hidden'));
      
      // Show the selected message content
      const messageId = target.dataset.message;
      const messageContent = document.getElementById(messageId);
      if (messageContent) {
        messageContent.classList.remove('hidden');
      }
    });
  });
</script>

  </body>
</html>
