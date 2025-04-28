// Funkcija konvertuoti failą į Base64
function readFileAsBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result);
    reader.onerror = err => reject(err);
    reader.readAsDataURL(file);
  });
}

// Paleisti kai užkraunamas visas puslapis
document.addEventListener('DOMContentLoaded', function () {
  // Pridėti receptą
  const recipeForm = document.getElementById('recipeForm');
  
  if (recipeForm) {
    recipeForm.addEventListener('submit', async function (e) {
      e.preventDefault();

      const title = document.getElementById('title').value.trim();
      const description = document.getElementById('description').value.trim();
      const ingredients = document.getElementById('ingredients').value.trim();
      const process = document.getElementById('process').value.trim();
      const category = document.getElementById('category').value.trim();
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
        ingredients,
        process,
        category,
        image: imageData,
        video: videoData
      };

      localStorage.setItem(uniqueID, JSON.stringify(recipe));

      let recipeList = JSON.parse(localStorage.getItem('recipeList')) || [];
      recipeList.push(uniqueID);
      localStorage.setItem('recipeList', JSON.stringify(recipeList));

      window.location.href = `recipe.html?id=${uniqueID}`;
    });
  }

  // Modal langas prisijungimui
  var modal = document.getElementById("loginModal");
  var btn = document.getElementById("openModal");
  var span = document.querySelector(".close");

  if (btn && modal) {
    btn.addEventListener("click", function () {
      modal.style.display = "block";
    });

    span?.addEventListener("click", function () {
      modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  }

  // Grįžimo į pagrindinį puslapį mygtukas
  const goHomeBtn = document.getElementById('goHome');
  if (goHomeBtn) {
    goHomeBtn.addEventListener('click', function() {
      window.location.href = '../Main.html';
    });
  }
});
