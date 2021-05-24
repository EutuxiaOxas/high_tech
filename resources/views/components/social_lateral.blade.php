<div class="lateral_social shadow d-none d-md-block">
    <div class="social_div" style="background-color: #3b5998;">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('facebook.svg') }}" alt="">
      </a>
    </div>
    <div class="social_div" style="background-color: #0077B5;">
      <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('linkedin.svg') }}" alt="">
      </a>
    </div>
    <div class="social_div" style="background-color: #FF5700;">
      <a href="http://reddit.com/submit?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('reddit.svg') }}" alt="">
      </a>
    </div>
    <div class="social_div" style="background-color: #1DA1F2;">
      <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('twitter.svg') }}" alt="">
      </a>
    </div>
    <div class="social_div" style="background-color: #25D366;">
      <a href="https://web.whatsapp.com/send?text={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('whatsapp.svg') }}" alt="">
      </a>
    </div>
    <div class="social_div" style="background-color: #0088CC; ">
      <a href="https://telegram.me/share/url?url={{ Request::url() }}" target="_blank">
        <img class="social_icon" src="{{ asset('telegram.svg') }}" alt="">
      </a>
    </div>
</div>
