<section 
  class="fixed bottom-0 lg:top-1/2 left-0 transform transition-all duration-300 right-0 lg:right-auto z-30 lg:-translate-y-1/2"
  x-data="{
    stickyShare: false,
    onScroll() { 
      this.stickyShare = window.scrollY > document.querySelector('.content').getBoundingClientRect().top + 150 && window.scrollY + 200 < document.querySelector('footer').getBoundingClientRect().bottom * 3 }
  }"
  @scroll.window="onScroll()"
  :class="{'invisible opacity-0 translate-y-full lg:-translate-y-1/2 lg:-translate-x-full': !stickyShare, 'visible opacity-100 translate-y-0 lg:translate-x-0 lg:-translate-y-1/2 z-50': stickyShare}">
  <ul class="bg-white lg:bg-transparent py-3 px-3 lg:pl-0 rounded-tr-lg rounded-br-lg text-center lg:text-left">
    <li class="inline-block lg:block"><a href="https://facebook.com/sharer.php?u=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-blue-700 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke Facebook"><i class="fab fa-facebook-f"></i></a></li>
    <li class="inline-block lg:block"><a href="https://twitter.com/share?url=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-blue-400 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke Twitter"><i class="fab fa-twitter"></i></a></li>
    <li class="inline-block lg:block"><a href="https://api.whatsapp.com/send?text=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-green-500 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
    <li class="inline-block lg:block"><a href="https://telegram.me/share/url?url=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-blue-600 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke Telegram"><i class="fab fa-telegram"></i></a></li>
    <li class="inline-block lg:block"><a href="https://pinterest.com/pin/create/link/?url=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-red-500 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke Pinterest"><i class="fab fa-pinterest"></i></a></li>
    <li class="inline-block lg:block"><a href="https://facebook.com/dialog/send?link=<?= current_url() ?>" target="_blank" rel="noreferrer noopener" class="w-10 hover:relative hover:w-16 transition-all duration-300 h-10 bg-blue-500 text-white text-lg inline-flex items-center justify-center" aria-label="Bagikan ke Facebook Messenger"><i class="fab fa-facebook-messenger"></i></a></li>
  </ul>
</section>