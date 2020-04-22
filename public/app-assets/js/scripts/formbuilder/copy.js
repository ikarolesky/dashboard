    function copyToClipboard(dataid) {
                    var range = document.createRange();
                    range.selectNode(document.getElementById(dataid));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();

                }
        function copyToClipboard1(datahead) {
                    var range = document.createRange();
                    range.selectNode(document.getElementById(datahead));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }
        function copyToClipboard2(databody) {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("databody"));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }


