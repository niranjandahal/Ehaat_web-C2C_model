function products(key){
// Create a form element
var form = document.createElement('form');
form.method = 'POST';
form.action = 'users/productdetail.php';

// Create an input element for the product_id
var input = document.createElement('input');
input.type = 'hidden';
input.name = 'product_id';
input.value = key;

// Append the input element to the form
form.appendChild(input);

// Append the form to the document body (you can append it to another element if needed)
document.body.appendChild(form);

// Submit the form
form.submit();
}

function generatehtml(data){

}

//send the post request to productdetail.php with the key as post name and value as key
    // var xhr = new XMLHttpRequest();
    // xhr.open("POST", "./users/productdetail.php", true);
    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         console.log(xhr.responseText);
    //     }
    // }
    // xhr.send("product_id="+key);
    // fetch("./users/productdetail.php", {
    //   method: 'POST',
    //   headers: {
    //     'Content-Type': 'application/x-www-form-urlencoded', 
    //   },
    //   body: "product_id="+key,
    //   redirect: "follow"
    // }).then() 
    
    // .then(response => {
    //   if (!response.ok) {
    //     throw new Error(`HTTP error! Status: ${response.status}`);
    //   }
    //   return response.json();
    // })
    // .then(data => {
    //   console.log('Final Response:', data);
    // })
    // .catch(error => {
    //   // Handle errors
    //   console.error('Error:', error);
    // });
