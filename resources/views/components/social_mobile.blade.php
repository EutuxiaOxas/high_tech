<div class="row d-md-none">
    <div class="col-12 mb-2 text-lg">
        Compartir:
    </div>
    <div class="col social_div mb-0" style="background-color: #3b5998;">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank" aria-label="compartir en facebook" rel="noreferrer">
        <img class="social_icon" src="{{ asset('facebook.svg') }}" alt="imagen para compartir en facebook" loading="lazy">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #0077B5;">
      <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank" aria-label="compartir en linkedin" rel="noreferrer">
        <img class="social_icon" src="{{ asset('linkedin.svg') }}" alt="compartir en linkedin" loading="lazy">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #FF5700;">
      <a href="http://reddit.com/submit?url={{ Request::url() }}" target="_blank" aria-label="compartir en reddit" rel="noreferrer">
        <img class="social_icon" src="{{ asset('reddit.svg') }}" alt="imagen para compartir en reddit" loading="lazy">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #1DA1F2;">
      <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank" aria-label="compartir en twitter" rel="noreferrer">
        <img class="social_icon" src="{{ asset('twitter.svg') }}" alt="imagen para compartir en twitter" loading="lazy">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #25D366;">
      <a href="https://web.whatsapp.com/send?text={{ Request::url() }}" target="_blank" aria-label="compartir en whatsapp" rel="noreferrer">>
        <img class="social_icon" src="{{ asset('whatsapp.svg') }}" alt="imagen para compartir en whatsapp" loading="lazy">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #0088CC; ">
      <a href="https://telegram.me/share/url?url={{ Request::url() }}" target="_blank" aria-label="compartir en telegram" rel="noreferrer">
        <img class="social_icon" src="{{ asset('telegram.svg') }}" alt="imagen para compartir en telegram" loading="lazy">
      </a>
    </div>
</div>
