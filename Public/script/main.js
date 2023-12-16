const asideItems = document.querySelectorAll(".aside-item");
const planMain = document.querySelector(".plan");
const tickets = document.querySelector(".tickets");
const tags = document.querySelector(".tags");
const ticketForm = document.querySelector(".ticket-form");
const createTicketBtn = document.querySelector(".create-btn");

asideItems[0].classList.add("bg-yellow-200", "text-yellow-900");

asideItems.forEach((elm) => {
    elm.addEventListener("click", ()=> {
        for(let i = 0; i < asideItems.length; i++) {
            asideItems[i].classList.remove("bg-yellow-200");
            asideItems[i].classList.remove("text-yellow-900");
        }
        elm.classList.add("bg-yellow-200", "text-yellow-900");
        ticketForm.classList.add("hidden");
        console.log(ticketForm.classList);

        if (elm === asideItems[0]) {
            planMain.style.display = "flex";
            tickets.style.display = "none";
            tags.style.display = "none";
        } else if (elm === asideItems[1]) {
            tickets.style.display = "flex";
            planMain.style.display = "none";
            tags.style.display = "none";
        } else {
            tags.style.display = "flex";
            planMain.style.display = "none";
            tickets.style.display = "none";
        }
        let refreshData = {tags: tags.style.display,
            plan: planMain.style.display,
            tickets: tickets.style.display};

        localStorage.setItem("refresh", JSON.stringify(refreshData));
    });
});

function showDropdownOptions(options, arrowUP, arrowDown) {
    document.getElementById(options).classList.toggle("hidden");
    document.getElementById(arrowUP).classList.toggle("hidden");
    document.getElementById(arrowDown).classList.toggle("hidden");
}

createTicketBtn.addEventListener("click", () => {
    ticketForm.classList.remove("hidden");
    tickets.style.display = "none";
});

const cancel = document.querySelector(".cancel");

cancel.addEventListener("click", ()=>{
    ticketForm.classList.add("hidden");
    tickets.style.display = "flex";
});
