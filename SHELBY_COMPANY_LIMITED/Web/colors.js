document.addEventListener("DOMContentLoaded", function () {
    const colorPicker = document.getElementById("colorPicker");

    colorPicker.addEventListener("input", function () {
        const newColor = colorPicker.value;
        document.body.style.color = newColor;
    });
});

// Função para atualizar a cor do texto
function updateTextColor() {
    const colorPicker = document.getElementById("colorPicker");
    const textColor = colorPicker.value;
    document.body.style.color = textColor;
}

// Função para atualizar a cor de fundo do site
function updateBackgroundColor() {
    const bgColorPicker = document.getElementById("bgColorPicker");
    const bgColor = bgColorPicker.value;
    document.body.style.backgroundColor = bgColor;
}

// Configurando os eventos de alteração de cores
document.getElementById("colorPicker").addEventListener("change", updateTextColor);
document.getElementById("bgColorPicker").addEventListener("change", updateBackgroundColor);
