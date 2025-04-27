const params = new URLSearchParams(window.location.search);
const recipeID = params.get('id');

if (recipeID) {
  const recipe = JSON.parse(localStorage.getItem(recipeID));

  if (recipe) {
    document.getElementById('recipeTitle').innerText = recipe.title;

    // Rodyti kategoriją (jeigu yra)
    if (recipe.category) {
      document.getElementById('recipeCategory').innerText = "Kategorija: " + recipe.category;
    } else {
      document.getElementById('recipeCategory').innerText = "Kategorija: Nepriskirta";
    }

    document.getElementById('recipeImage').src = recipe.image;

    const videoElement = document.getElementById('recipeVideo');
    if (recipe.video) {
      videoElement.style.display = 'block';
      videoElement.src = recipe.video;
    }

    document.getElementById('recipeDescription').innerText = recipe.description;
    document.getElementById('recipeIngredients').innerText = recipe.ingredients;
    document.getElementById('recipeProcess').innerText = recipe.process;
  } else {
    alert('Receptas nerastas!');
  }
} else {
  alert('Recepto ID nėra!');
}

// Grįžimo mygtuko funkcionalumas
document.getElementById('backButton').addEventListener('click', function() {
  window.location.href = 'P.html';
});
