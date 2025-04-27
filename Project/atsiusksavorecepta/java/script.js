// Funkcija konvertuoti failą į Base64
function readFileAsBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result);
    reader.onerror = err => reject(err);
    reader.readAsDataURL(file);
  });
}

// Pridėti receptą
document.getElementById('recipeForm').addEventListener('submit', async function (e) {
  e.preventDefault();

  const title = document.getElementById('title').value;
  const description = document.getElementById('description').value;
  const ingredients = document.getElementById('ingredients').value;
  const process = document.getElementById('process').value;
  const category = document.getElementById('category').value;
  const imageFile = document.getElementById('image').files[0];
  const videoFile = document.getElementById('video').files[0];

  if (!imageFile) {
    alert("Paveikslėlis yra privalomas!");
    return;
  }

  const imageData = await readFileAsBase64(imageFile);
  const videoData = videoFile ? await readFileAsBase64(videoFile) : null;

  const uniqueID = `recipe-${Date.now()}`;
  const recipe = {
    title,
    description,
    image: imageData,
    video: videoData,
    ingredients,
    process,
    category // naujas laukas!
  };

  localStorage.setItem(uniqueID, JSON.stringify(recipe));

  let recipeList = JSON.parse(localStorage.getItem('recipeList')) || [];
  recipeList.push(uniqueID);
  localStorage.setItem('recipeList', JSON.stringify(recipeList));

  window.location.href = `recipe.html?id=${uniqueID}`;
});
