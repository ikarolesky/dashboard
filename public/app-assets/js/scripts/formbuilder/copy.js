    function copyToClipboard() {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("copycode"));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }
        function copyToClipboard1() {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("copyhead"));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }
        function copyToClipboard2() {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("copybody"));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }