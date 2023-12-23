document.addEventListener('DOMContentLoaded', () => {
    const tela = document.createElement('div');
    tela.classList.add('tela');
    document.body.appendChild(tela);
    setTimeout(() => {
        // Define a transformação para mover a tela para cima após um atraso de 1 segundo
        tela.style.transform = 'translateY(-100%)';
    }, 80);
});
