const typeWriter = document.getElementById('typewriter-text');
const text = 'Bienvenido al sistemas IEBC';

typeWriter.innerHTML = text;
typeWriter.style.setProperty('--characters', text.length);