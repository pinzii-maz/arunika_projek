let currentStep = 1;

function nextStep() {
  const currentDiv = document.getElementById(`step${currentStep}`);
  const nextDiv = document.getElementById(`step${currentStep + 1}`);

  if (nextDiv) {
    currentDiv.classList.add("hidden");
    nextDiv.classList.remove("hidden");
    currentStep++;
  }
}

function previousStep() {
  const currentDiv = document.getElementById(`step${currentStep}`);
  const previousDiv = document.getElementById(`step${currentStep - 1}`);

  if (previousDiv) {
    currentDiv.classList.add("hidden");
    previousDiv.classList.remove("hidden");
    currentStep--;
  }
}

const canvas = document.getElementById("signatureCanvas");
const ctx = canvas.getContext("2d");

// Mengatur latar belakang kanvas menjadi putih
ctx.fillStyle = "#ffffff"; // Warna putih
ctx.fillRect(0, 0, canvas.width, canvas.height); // Mengisi kanvas dengan warna putih

let drawing = false;

canvas.addEventListener("mousedown", function (event) {
  drawing = true;
  ctx.beginPath();
  ctx.moveTo(event.offsetX, event.offsetY);
});

canvas.addEventListener("mousemove", function (event) {
  if (drawing) {
    ctx.lineTo(event.offsetX, event.offsetY);
    ctx.stroke();
  }
});

canvas.addEventListener("mouseup", function () {
  drawing = false;
});

canvas.addEventListener("mouseout", function () {
  drawing = false;
});

function clearCanvas() {
  ctx.fillStyle = "#ffffff"; // Warna putih
  ctx.fillRect(0, 0, canvas.width, canvas.height); // Mengisi ulang kanvas dengan warna putih
}

function getSignature() {
  const signatureData = canvas.toDataURL("image/png");
  document.getElementById("signatureData").value = signatureData;
}
