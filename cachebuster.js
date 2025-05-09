(function() {
    const now = new Date();
  
    // বাংলাদেশ টাইম (UTC+6)
    now.setHours(now.getHours() + 6);
  
    const version = `${now.getFullYear()}${now.getMonth()+1}${now.getDate()}${now.getHours()}${now.getMinutes()}${now.getSeconds()}`;
  
    // CSS update
    const style = document.getElementById("dynamic-style");
    style.href = `style.css?v=${version}`;
  
    // JS update
    const script = document.getElementById("dynamic-script");
    const newScript = document.createElement("script");
    newScript.src = `src/js/script.js?v=${version}`;
    script.parentNode.replaceChild(newScript, script);
  })();
  