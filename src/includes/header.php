

  <div id="relative" class="carousel-container">
    <header>
      <div id="indicators-carousel" class="relative" data-carousel="static">
        <div class="overflow-hidden relative h-screen">
          <!-- Item 1 -->
          <div class="w-full h-screen duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 " data-carousel-item="active">
            <img src="./images/c.jpg" class="bg-center w-full h-screen object-cover" alt="Couple homme et femme">
            <div class="absolute right-0 top-1/2 transform -translate-y-1/2 text-black font-bold md:text-4xl sm:text-2xl mr-8">
              <span class="bg-white px-2">Mode homme et femme</span>
            </div>
          </div>
       
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="./images/d.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Sacs de shopping">
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 text-black font-bold md:text-4xl sm:text-2xl ml-8">
              <span class="bg-white px-2">Achetez en ligne avec Online training!</span>
            </div>
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="./images/e.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Fromatrice et apprenante">
            <div class="absolute right-0 top-1/2 transform -translate-y-1/2 text-black font-bold md:text-4xl sm:text-2xl mr-8">
              <span class="bg-white px-2">Nos équipes à votre écoute</span>
            </div>
          </div>
          
        </div>
        <!-- Slider controls -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-3">
          <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          </div>
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
          <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden">Précédent</span>
          </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
          <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="hidden">Suivant</span>
          </span>
        </button>
      </div>
    </header>
  </div>


  <script>
document.addEventListener('DOMContentLoaded', function() {
  const carouselItems = document.querySelectorAll('[data-carousel-item]');
  const carouselIndicators = document.querySelectorAll('[data-carousel-slide-to]');
  const prevButton = document.querySelector('[data-carousel-prev]');
  const nextButton = document.querySelector('[data-carousel-next]');

  let currentIndex = 0; // Index de l'élément actuellement affiché
  let intervalId; // Identifiant de l'intervalle pour le défilement automatique
  const intervalDuration = 5000; // Durée en millisecondes entre chaque changement de slide

  // Fonction pour afficher un élément du carrousel
  function showCarouselItem(index) {
    // Masquer tous les items du carrousel
    carouselItems.forEach(item => {
      item.classList.add('hidden');
    });

    // Afficher l'élément spécifié par l'index
    carouselItems[index].classList.remove('hidden');

    // Mettre à jour l'indicateur du carrousel
    carouselIndicators.forEach((indicator, idx) => {
      if (idx === index) {
        indicator.classList.add('bg-white');
        indicator.classList.remove('bg-white/50', 'hover:bg-white');
        indicator.setAttribute('aria-current', 'true');
      } else {
        indicator.classList.remove('bg-white');
        indicator.classList.add('bg-white/50', 'hover:bg-white');
        indicator.setAttribute('aria-current', 'false');
      }
    });
  }

  // Gestion du clic sur les indicateurs du carrousel
  carouselIndicators.forEach((indicator, index) => {
    indicator.addEventListener('click', function() {
      currentIndex = index;
      showCarouselItem(currentIndex);
      resetInterval();
    });
  });

  // Gestion du clic sur le bouton précédent
  prevButton.addEventListener('click', function() {
    currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
    showCarouselItem(currentIndex);
    resetInterval();
  });

  // Gestion du clic sur le bouton suivant
  nextButton.addEventListener('click', function() {
    currentIndex = (currentIndex + 1) % carouselItems.length;
    showCarouselItem(currentIndex);
    resetInterval();
  });

  // Fonction pour démarrer le défilement automatique
  function startInterval() {
    intervalId = setInterval(function() {
      currentIndex = (currentIndex + 1) % carouselItems.length;
      showCarouselItem(currentIndex);
    }, intervalDuration);
  }

  // Fonction pour réinitialiser l'intervalle
  function resetInterval() {
    clearInterval(intervalId);
    startInterval();
  }

  // Démarrer le défilement automatique au chargement de la page
  startInterval();
});
</script>
