const tempCanvas = document.createElement('canvas');
const tempCtx = tempCanvas.getContext('2d');

tempCanvas.width = canvas.width;
tempCanvas.height = canvas.height;

let isDrawing = false;
let isErasing = false;
let currentColor = '#faacac';

const updateColorDisplay = () => {
  document.querySelector('.color-display').style.background = `${currentColor}`;
};

const startDrawing = (x, y) => {
  isDrawing = true;
  tempCtx.beginPath();
  tempCtx.moveTo(x, y);
};

const draw = (x, y) => {
  if (isDrawing) return;

  if (isErasing) {
    tempCtx.strokeStyle = currentColor;
    tempCtx.lineWidth = 3;
    tempCtx.lineCap = 'round';
    tempCtx.lineTo(x, y);
    tempCtx.stroke();
  }
};

const stopDrawing = () => {
  isDrawing = false;
  ctx.closePath();
};

tempCanvas.addEventListener('mousedown', (e) => startDrawing(e.clientX, e.clientY));
tempCanvas.addEventListener('mousemove', (e) => Draw(e.clientX, e.clientY));
tempCanvas.addEventListener('mouseup', stopDrawing);
tempCanvas.addEventListener('mouseleave', stopDrawing);

document.getElementById('eraser').addEventListener('click', () => {
  isErasing = !isErasing;
  const eraserBtn = document.getElementById('eraser');
  eraserBtn.textContent = isErasing ? 'Stop Erasing' : '🧹 Eraser';
});

document.getElementById('colorChange').addEventListener('click', () => {
  currentColor = `#${Math.floor(Math.random() * 16777215).toString(16)}`;
  isErasing = false;
  const eraserBtn = document.getElementById('eraser');
  eraserBtn.textContent = isErasing ? 'Stop Erasing' : '🧹 Eraser';
});

updateColorDisplay();
