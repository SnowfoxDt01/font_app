<header class="header">

  @if(isset($fonts) && count($fonts) > 0)
      @foreach($fonts as $f)
          <style>
              @font-face {
                  font-family: '{{ $f->name }}';
                  src: url('{{ asset('storage/' . $f->file_path) }}') format('{{ $f->format }}');
                  font-display: swap;
              }
          </style>
      @endforeach
  @endif


  <div class="logo"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L15 8L22 9L17 14L18 21L12 18L6 21L7 14L2 9L9 8L12 2Z" fill="#F6A11A"/></svg> fontvisual</div>
  <div class="header-right">
    <div class="icon-btn" title="Help">?</div>
    <div class="icon-btn" title="Settings">⚙</div>
    <a class="btn" href="#">Nâng cấp</a>
    <div class="icon-btn">👤</div>
  </div>
</header>