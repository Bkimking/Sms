// JavaScript for interactive features (e.g., scroll effects or dynamic content)
document.addEventListener('DOMContentLoaded', () => {
  const scrollToTopBtn = document.getElementById('scrollToTopBtn');

  // Show button after scrolling down
  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
      scrollToTopBtn.style.display = 'flex';
    } else {
      scrollToTopBtn.style.display = 'none';
    }
  });

  // Smooth scroll to top when the button is clicked
  scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});

// Simulate a loading screen with a smooth fade-in effect
document.addEventListener("DOMContentLoaded", () => {
  const loadingScreen = document.getElementById("loading-screen");

  // Simulate a loading process (e.g., fetch resources, images, etc.)
  setTimeout(() => {
      // Hide the loading screen with a smooth fade-out effect
      loadingScreen.style.opacity = "0";

      // Remove the loading screen from the DOM after the animation
      setTimeout(() => {
          loadingScreen.style.display = "none";
      }, 1000); // Match the CSS transition duration
  }, 1000); // Adjust the delay as needed
});

//Show the sponsors slideshow img
document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.sponsors-container');
  const images = container.querySelectorAll('.sponsor-img');

  // Duplicate images for infinite scroll effect
  images.forEach(image => {
      const clone = image.cloneNode(true);
      container.appendChild(clone);
  });
});

//newsletter from the footer
document.addEventListener("DOMContentLoaded", () => {
  const newsletterForm = document.getElementById("newsletterForm");
  const newsletterEmail = document.getElementById("newsletterEmail");
  const subscriptionMessage = document.getElementById("subscriptionMessage");

  newsletterForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const email = newsletterEmail.value.trim();

      if (email) {
          subscriptionMessage.style.display = "block";
          newsletterEmail.value = "";
          setTimeout(() => {
              subscriptionMessage.style.display = "none";
          }, 5000);
      }
  });
});

// hover effect on nav
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".nav-item.dropdown").forEach((dropdown) => {
    dropdown.addEventListener("mouseenter", function () {
      let menu = this.querySelector(".dropdown-menu");
      menu.classList.add("show");
    });

    dropdown.addEventListener("mouseleave", function () {
      let menu = this.querySelector(".dropdown-menu");
      menu.classList.remove("show");
    });
  });
});

// application county and subcounty section update
document.addEventListener("DOMContentLoaded", function () {
  // Define the counties and their corresponding sub-counties
  const subCounties = {
      "Baringo": ["Baringo Central", "Baringo North", "Baringo South", "Eldama Ravine", "Mogotio", "Tiaty"],
      "Bomet": ["Bomet Central", "Bomet East", "Chepalungu", "Konoin", "Sotik"],
      "Bungoma": ["Bumula", "Kabuchai", "Kanduyi", "Kimilili", "Mt. Elgon", "Sirisia", "Tongaren", "Webuye East", "Webuye West"],
      "Busia": ["Budalangi", "Butula", "Funyula", "Matayos", "Nambale", "Teso North", "Teso South"],
      "Elgeyo-Marakwet": ["Alale", "Keiyo North", "Keiyo South", "Marakwet East", "Marakwet West", "Tot"],
      "Embu": ["Embu North", "Embu South", "Mbeere North", "Mbeere South"],
      "Garissa": ["Garissa Township", "Ijara", "Lagdera", "Fafi", "Dadaab"],
      "Homa Bay": ["Homa Bay Town", "Kaksingri", "Karachuonyo", "Kendu Bay", "Mbita", "Ndhiwa", "Rangwe", "Suba"],
      "Isiolo": ["Isiolo Town", "Merti", "Oldonyiro"],
      "Kajiado": ["Kajiado East", "Kajiado North", "Kajiado South", "Kajiado West", "Loitokitok"],
      "Kakamega": ["Butere", "Kakamega Central", "Kakamega East", "Kakamega North", "Kakamega South", "Lurambi", "Matungu", "Mumias East", "Mumias West", "Shinyalu"],
      "Kericho": ["Ainamoi", "Bureti", "Kapsoit", "Kipkelion", "Kiptigis", "Sotik"],
      "Kiambu": ["Gatundu North", "Gatundu South", "Juja", "Kabete", "Kikuyu", "Kiambaa", "Kimbo", "Limuru", "Ruiru", "Thika Town"],
      "Kilifi": ["Kilifi North", "Kilifi South", "Malindi", "Magarini", "Ganze", "Kaloleni", "Rabai"],
      "Kirinyaga": ["Gichugu", "Kutus", "Mwea", "Kirinyaga Central", "Kirinyaga East", "Kirinyaga West"],
      "Kisii": ["Bosogo", "Kitutu Chache", "Mogonga", "Nyamache", "South Mugirango", "West Mugirango", "Bobasi"],
      "Kisumu": ["Kisumu Central", "Kisumu East", "Kisumu West", "Nyando", "Nyakach", "Seme", "Muhoroni", "Ahero"],
      "Kitui": ["Kitui Central", "Kitui East", "Kitui West", "Mwingi Central", "Mwingi East", "Mwingi West", "Zombe", "Mutomo", "Ikutha"],
      "Kwale": ["Lunga Lunga", "Matuga", "Msambweni", "Kinango"],
      "Laikipia": ["Laikipia East", "Laikipia North", "Laikipia West", "Nyahururu", "Nanyuki", "Rumuruti"],
      "Lamu": ["Lamu East", "Lamu West", "Lamu Central"],
      "Machakos": ["Machakos Town", "Masinga", "Matungulu", "Kangundo", "Yatta", "Kathiani", "Mwala"],
      "Makueni": ["Makueni", "Kangundo", "Kangundo West", "Mbooni", "Kilungu", "Kaiti", "Mbooni East", "Mbooni West"],
      "Mandera": ["Mandera East", "Mandera North", "Mandera West", "Banisa", "Lafey", "Fafi"],
      "Marsabit": ["Marsabit Town", "North Horr", "Laisamis", "Saku", "Turbi", "Sololo"],
      "Meru": ["Imenti North", "Imenti South", "Imenti Central", "Buuri", "Tigania East", "Tigania West", "Chuka", "Tharaka", "Magumoni"],
      "Migori": ["Migori Town", "Awendo", "Rongo", "Kuria East", "Kuria West", "Suna East", "Suna West"],
      "Mombasa": ["Mombasa Town", "Changamwe", "Jomvu", "Kisauni", "Nyali", "Likoni"],
      "Murang'a": ["Kangema", "Kahuro", "Kiharu", "Maragua", "Mathioya", "Murang'a Town"],
      "Nairobi": ["Central", "Eastlands", "Westlands", "South B", "South C", "Kasarani", "Lang'ata"],
      "Nakuru": ["Nakuru Town", "Gilgil", "Naivasha", "Subukia", "Molo", "Rongai", "Kuresoi North", "Kuresoi South"],
      "Nandi": ["Nandi Hills", "Chesumei", "Emgwen", "Ainabkoi"],
      "Narok": ["Narok North", "Narok South", "Narok East", "Transmara"],
      "Nyamira": ["Nyamira Town", "Bokeira", "Borabu", "Manga", "Nyamira North", "Nyamira South"],
      "Nyandarua": ["Ol Kalou", "Ndaragwa", "Kinangop", "Nyandarua East", "Nyandarua West", "Karatina"],
      "Nyeri": ["Nyeri Town", "Nyeri North", "Nyeri South", "Othaya", "Kieni"],
      "Samburu": ["Samburu Central", "Samburu East", "Samburu North", "Samburu West"],
      "Siaya": ["Siaya Town", "Ugunja", "Ugenya", "Bondo", "Rarieda", "Gem", "Alego Usonga"],
      "Taita-Taveta": ["Taveta", "Voi", "Mwatate", "Wundanyi", "Bura", "Taita"],
      "Tana River": ["Bura", "Garsen", "Hidaman", "Tana Delta", "Tana River West"],
      "Tharaka-Nithi": ["Chuka", "Muthambi", "Maara", "Tharaka", "Igembe North", "Igembe South"],
      "Trans Nzoia": ["Kiminini", "Cherangani", "Endebess", "Saboti", "Trans Nzoia West"],
      "Turkana": ["Turkana Central", "Turkana East", "Turkana South", "Turkana North", "Turkana West", "Loima"],
      "Uasin Gishu": ["Eldoret East", "Eldoret West", "Turbo", "Kapseret", "Kesses", "Rongai"],
      "Vihiga": ["Emuhaya", "Hamisi", "Luanda", "Sabatia", "Vihiga Town"],
      "Wajir": ["Wajir East", "Wajir North", "Wajir South", "Wajir West"],
      "West Pokot": ["Kapenguria", "Kacheliba", "Kibung'a", "Pokot Central", "Pokot South", "Pokot West"]
  };

  // Reference elements
  const countySelect = document.getElementById("county");
  const subCountySelect = document.getElementById("subcounty");

  // Event listener for county selection change
  countySelect.addEventListener("change", function () {
      const selectedCounty = this.value;
      subCountySelect.innerHTML = '<option value="">Select a sub-county</option>';
      
      if (selectedCounty in subCounties) {
          subCounties[selectedCounty].forEach(subCounty => {
              let option = new Option(subCounty, subCounty);
              subCountySelect.add(option);
          });
      }
  });
});

// student application form js validation 
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#applyModal form");

  form.addEventListener("submit", function (event) {
      let isValid = true;
      let errorMessage = "";

      // Get form elements
      const surname = document.getElementById("surname").value.trim();
      const firstname = document.getElementById("firstname").value.trim();
      const middlename = document.getElementById("middlename").value.trim();
      const email = document.getElementById("email").value.trim();
      const dob = document.getElementById("dob").value;
      const idnumber = document.getElementById("idnumber").value.trim();
      const gender = document.getElementById("gender").value;
      const maritalStatus = document.getElementById("marital-status").value;
      const tshirtsize = document.getElementById("tshirtsize").value;
      const homeaddress = document.getElementById("homeaddress").value.trim();
      const county = document.getElementById("county").value;
      const subcounty = document.getElementById("subcounty").value;
      const tel = document.getElementById("tel").value.trim();

      // Helper function for name validation
      function isValidName(name) {
          return /^[a-zA-Z]{2,}$/.test(name);
      }

      // Name validation
      if (!isValidName(surname)) {
          isValid = false;
          errorMessage += "❌ Surname must contain at least 2 letters.<br>";
      }
      if (!isValidName(firstname)) {
          isValid = false;
          errorMessage += "❌ First name must contain at least 2 letters.<br>";
      }
      if (middlename && !isValidName(middlename)) {
          isValid = false;
          errorMessage += "❌ Middle name must contain at least 2 letters if provided.<br>";
      }

      // Email validation
      if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
          isValid = false;
          errorMessage += "❌ Invalid email format.<br>";
      }

      // Date of Birth validation (Must be 18+)
      if (dob) {
          const birthDate = new Date(dob);
          const today = new Date();
          const age = today.getFullYear() - birthDate.getFullYear();
          const monthDiff = today.getMonth() - birthDate.getMonth();
          if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
              age--;
          }
          if (age < 18) {
              isValid = false;
              errorMessage += "❌ You must be at least 18 years old.<br>";
          }
      }

      // ID Number validation (Must be at least 8 digits)
      if (!/^\d{8,}$/.test(idnumber)) {
          isValid = false;
          errorMessage += "❌ ID Number must be at least 8 digits.<br>";
      }

      // Select fields validation
      if (!gender) {
          isValid = false;
          errorMessage += "❌ Please select your gender.<br>";
      }
      if (!maritalStatus) {
          isValid = false;
          errorMessage += "❌ Please select your marital status.<br>";
      }
      if (!tshirtsize) {
          isValid = false;
          errorMessage += "❌ Please select your T-shirt size.<br>";
      }
      if (!county) {
          isValid = false;
          errorMessage += "❌ Please select your county.<br>";
      }
      if (!subcounty) {
          isValid = false;
          errorMessage += "❌ Please select your sub-county.<br>";
      }

      // Address validation
      if (homeaddress.length < 5) {
          isValid = false;
          errorMessage += "❌ Home Address must be at least 5 characters long.<br>";
      }

      // Telephone validation (Kenyan format: starts with 07, 01, or international format)
      if (!/^(?:\+254|0)(7\d{8}|1\d{8})$/.test(tel)) {
          isValid = false;
          errorMessage += "❌ Invalid Kenyan phone number format.<br>";
      }

      // If the form is not valid, prevent submission and show SweetAlert
      if (!isValid) {
          event.preventDefault();
          Swal.fire({
              title: "Form Validation Error",
              html: errorMessage,
              icon: "error",
              confirmButtonText: "Fix Issues",
              confirmButtonColor: "#dc3545",
          });
      }
  });
});

