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


var changed;
$('select[multiple="multiple"]').change(function(e) {
    var select = $(this);
    var list = select.data('prevstate');
    var val = select.val();
    if (list == null) {
        list = val;
    } else if (val.length == 1) {
        val = val.pop();
        var pos = list.indexOf(val);
        if (pos == -1)
            list.push(val);
        else
            list.splice(pos, 1);
    } else {
        list = val;
    }
    select.val(list);
    select.data('prevstate', list);
    changed = true;
}).find('option').click(function() {
    if (!changed){
        $(this).parent().change();
    }
    changed = false;
});

const multiSelectWithoutCtrl = ( elemSelector ) => {
    let options = [].slice.call(document.querySelectorAll(`${elemSelector} option`));
    options.forEach(function (element) {
        element.addEventListener("mousedown",
            function (e) {
                e.preventDefault();
                element.parentElement.focus();
                this.selected = !this.selected;
                return false;
            }, false );
    });
}

multiSelectWithoutCtrl('#options-tag-form')
