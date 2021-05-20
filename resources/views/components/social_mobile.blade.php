<div class="row d-md-none">
    <div class="col-12 mb-2 text-lg">
        Compartir:
    </div>
    <div class="col social_div mb-0" style="background-color: #3b5998;">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/facebook.svg') }}" alt="">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #0077B5;">
      <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/linkedin.svg') }}" alt="">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #FF5700;">
      <a href="http://reddit.com/submit?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/reddit.svg') }}" alt="">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #1DA1F2;">
      <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/twitter.svg') }}" alt="">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #25D366;">
      <a href="https://web.whatsapp.com/send?text={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/whatsapp.svg') }}" alt="">
      </a>
    </div>
    <div class="col social_div mb-0" style="background-color: #0088CC; ">
      <a href="https://telegram.me/share/url?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('icons/social/telegram.svg') }}" alt="">
      </a>
    </div>
</div>
