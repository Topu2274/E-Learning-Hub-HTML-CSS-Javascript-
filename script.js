// Register Form Handling
const registerForm = document.getElementById('register');
if (registerForm) {
  registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;
    alert(`Registration Attempt: Name - ${name}, Email - ${email}, Role - ${role}`);
    // You can add backend API call here
  });
}

// Book Details Page Buttons
const downloadBtn = document.getElementById('download-btn');
const saveBtn = document.getElementById('save-btn');

if (downloadBtn) {
  downloadBtn.addEventListener('click', () => {
    alert('Downloading book...');
  });
}

if (saveBtn) {
  saveBtn.addEventListener('click', () => {
    alert('Book saved to your account!');
  });
}

// Categories Section - Dynamic Book Loading
const books = {
  science: [
    { title: "Physics for Beginners", author: "John Doe" },
    { title: "Chemistry Basics", author: "Jane Smith" },
  ],
  arts: [
    { title: "History of Art", author: "Alice Brown" },
    { title: "Modern Literature", author: "Bob White" },
  ],
  engineering: [
    { title: "Introduction to Programming", author: "Charlie Green" },
    { title: "Mechanical Engineering 101", author: "David Black" },
  ],
};

// Function to show books based on category
function showCategory(category) {
  const booksContainer = document.getElementById('books-container');
  booksContainer.innerHTML = ""; // Clear previous content

  books[category].forEach((book) => {
    const bookDiv = document.createElement('div');
    bookDiv.className = 'book';
    bookDiv.innerHTML = `
      <h3>${book.title}</h3>
      <p>Author: ${book.author}</p>
      <button onclick="viewDetails('${book.title}')">View Details</button>
    `;
    booksContainer.appendChild(bookDiv);
  });
}

// Function to handle "View Details" button click
function viewDetails(title) {
  alert(`You clicked: ${title}`);
  // Redirect to book-details.html or show more details
}