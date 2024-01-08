<footer class="footer mt-auto">
    <div class="copyright bg-white">
      <p>
        &copy; <span id="copy-year"></span>Copyright Mono Dashboard Bootstrap Template by
          <a class="text-primary" href="" target="_blank" >{{ __('Talha') }}</a>.
      </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
  </footer>
