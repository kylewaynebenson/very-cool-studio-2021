function switchTheme(e){e.target.checked?(document.documentElement.setAttribute("data-theme","dark"),localStorage.setItem("theme","dark")):(document.documentElement.setAttribute("data-theme","light"),localStorage.setItem("theme","light"))}const toggleSwitch=document.querySelector('.theme-switch input[type="checkbox"]');toggleSwitch.addEventListener("change",switchTheme,!1);const currentTheme=localStorage.getItem("theme")?localStorage.getItem("theme"):null;currentTheme?(document.documentElement.setAttribute("data-theme",currentTheme),"dark"===currentTheme&&(toggleSwitch.checked=!0)):window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches?(document.documentElement.setAttribute("data-theme","dark"),toggleSwitch.checked=!0):document.documentElement.setAttribute("data-theme","light");