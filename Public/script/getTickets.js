const listContainer = document.getElementById("ticket_list_container");


function truncateString(string, limit) {
    if (string.length > limit) {
        return string.substring(0, limit) + "..."
    } else {
        return string
    }
}

let filterBy = "all";
let id = "2";

function callAjax() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/get_all_ticket.php",
        success: function (data) {

            ticketData = JSON.parse(data);
            console.log(ticketData);
            listContainer.innerHTML = "";

            for (let i = 0; i < ticketData.length; i++) {
                let tags = "";
                let assign = "";

                for (let y = 0; y < ticketData[i].tags.length; y++) {
                    tags += `<p class='block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal'>${ticketData[i].tags[y].tag}</p>`;
                }

                for (let x = 0; x < ticketData[i].assign.length; x++) {
                    let picture = ticketData[i].assign[x].picture.substr(13);
                    assign += `<img alt="Assigned Agent" src="${picture}" class="relative inline-block h-12 w-12 rounded-full border-2 border-white object-cover object-center hover:z-10 focus:z-10" />`;
                }

                let description = truncateString(ticketData[i].description, 19);
                let checker = false;

                if (filterBy === "all") checker = true;
                else if (filterBy === "creator") {
                    if (ticketData[i].creator_id == id) checker = true;
                } else {
                    for (let x = 0; x < ticketData[i].assign.length; x++) {
                        console.log(ticketData[i].assign[x].user_id);
                        if (ticketData[i].assign[x].user_id == id) checker = true;
                    }
                }


                if (checker === true) {
                    listContainer.innerHTML += `<tr>
                      <td class='p-4 border-b border-blue-gray-50'>
                      <div class='flex items-center gap-3'>
                          <div class='flex flex-col'>
                              <p class='block antialiased font-bold text-sm leading-normal text-blue-gray-900 font-normal'>${ticketData[i].creator}</p>
                              <img alt"Assigned Agent" src="${ticketData[i].picture.substr(13)}" class="relative inline-block h-12 w-12 rounded-full border-2 border-white object-cover object-center hover:z-10 focus:z-10" />
                          </div>
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <div class='flex items-center gap-3'>
                          <div class='flex flex-col'>
                              <p class='block antialiased font-bold text-sm leading-normal text-blue-gray-900 font-normal'>${ticketData[i].subject}</p>
                              <p class='block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal'>${description}</p>
                              <p class='block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70'>Start date: 10 Dec 2023</p>
                          </div>
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <div class='flex items-center gap-3'>
                          ${assign}
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <div class='flex flex-col'>
                          <h2 class='block antialiased font-sans text-sm leading-normal text-red-900 font-bold'>${ticketData[i].priority}</h2>
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                  <div class='flex flex-col'>
                  <p class='block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal'>${tags}</p>
                        
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <div class='w-max'>
                          <div class='relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-green-500/20 text-green-600 py-1 px-2 text-xs rounded-md' style='opacity: 1;'>
                              <span class=''>${ticketData[i].status}</span>
                          </div>
                      </div>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <p class='block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal'>23/04/18</p>
                  </td>
                  <td class='p-4 border-b border-blue-gray-50'>
                      <a href="pages/update_ticket.php?ticket_id=${ticketData[i].ticket_id}" class='relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30'>
            <span class='absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2'>
              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' aria-hidden='true' class='h-4 w-4'>
                <path d='M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z'></path>
              </svg>
            </span>
                      </a>
                  </td>
              </tr>`;
                }

            }
        },

        error: function (xhr, status, error) {
            console.error('AJAX call failed with status ' + status + ': ' + error);

        }
    });
}


setInterval(filter(filterBy, id), 6000);

function filter(filter, user_id) {

    if (filter === "assign") filterBy = "assign";
    else if (filter === "creator") filterBy = "creator";
    else filterBy = "all";
    if (!isNaN(user_id))
        id = user_id;
    callAjax(id);
}

