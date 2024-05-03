document.addEventListener('DOMContentLoaded', function() {
    const customElement = document.createElement('div');
    customElement.innerText = 'Custom JavaScript is running!';
    customElement.style.backgroundColor = 'lightgreen';
    customElement.style.padding = '10px';
    customElement.style.textAlign = 'center';

    document.body.appendChild(customElement);
});