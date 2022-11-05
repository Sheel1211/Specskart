console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode.parentNode;
	Array.from(e.target.parentNode.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			signupBtn.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

signupBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode;
	Array.from(e.target.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			loginBtn.parentNode.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

const btn = document.querySelector(".place-order");

btn.addEventListener("click", () => {
  btn.classList.remove("place-order--default");
  btn.classList.add("place-order--placing");
  setTimeout(() => {
    btn.classList.remove("place-order--placing");
    btn.classList.add("place-order--done");
  }, 4000);
  setTimeout(() => {
    btn.classList.remove("place-order--done");
    btn.classList.add("place-order--default");
  }, 6000);
})	