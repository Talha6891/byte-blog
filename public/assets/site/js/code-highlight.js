// copy-code.js
document.addEventListener("DOMContentLoaded", function () {
    var snippets = document.querySelectorAll('pre code');
    snippets.forEach(function (snippet) {
        var wrapper = document.createElement('div');
        wrapper.className = 'code-snippet position-relative';
        snippet.parentNode.insertBefore(wrapper, snippet);
        wrapper.appendChild(snippet);

        var button = document.createElement('button');
        button.className = 'btn btn-success btn-sm hljs-copy position-absolute top-0 end-0 m-2';
        button.innerText = 'Copy';
        wrapper.appendChild(button);

        button.addEventListener('click', function () {
            var textArea = document.createElement('textarea');
            textArea.value = snippet.innerText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            button.innerText = 'Copied!';
            setTimeout(function () {
                button.innerText = 'Copy';
            }, 1000);
        });
    });
});
