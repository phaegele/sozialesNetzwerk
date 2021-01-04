window.onload = function() {
    document.getElementById("regform").onsubmit = function() {
        return plausi(document.getElementsByTagName("input"))        
    };
};