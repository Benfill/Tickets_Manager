 <!-- ticket form -->

      <section class="ticket-form hidden py-1 bg-blueGray-50">
          <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                  <div class="rounded-t bg-white mb-0 px-6 py-6">
                      <div class="text-center flex justify-between">
                          <h6 class="text-blueGray-700 text-xl font-bold">
                              New ticket
                          </h6>
                      </div>
                  </div>
                  <hr class="mt-6 border-b-1 border-blueGray-300">
                  <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                      <form method="post" action="../app/controllers/ticket_form.php">
                          <div class="flex flex-wrap">
                              <div class="w-full lg:w-6/12 px-4">
                                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                      Subject
                                  </label>
                                  <div class="relative w-full mb-3 flex">
                                      <label class="ml-2">
                                          <input required type="text" name="subject" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4">
                                      </label>
                                  </div>
                              </div>

                              <div class="w-full lg:w-6/12 px-4 relative">
                                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                      Deadline
                                  </label>
                                  <input required datepicker datepicker-autohide name="deadline" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                              </div>

                          </div>


                          <div class="flex flex-wrap">
                              <div class="w-full lg:w-6/12 px-4">
                                  <div class="relative w-full mb-3">
                                      <label for="options-assignment" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                          Assignment
                                      </label>
                                      <div onclick="showDropdownOptions('options-assignment-form', 'arrow-up-assignment-form', 'arrow-down-assignment-form')" class="flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
                                          <span class="select-none">Chose assignment</span>
                                          <svg id="arrow-down-assignment-form" class="hidden w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                          <svg id="arrow-up-assignment-form" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                                      </div>
                                      <select required name="assignment[]" id="options-assignment-form" class="hidden absolute z-10 w-48 py-2 mt-2 bg-white rounded-lg shadow-xl" multiple>
                                          <?php foreach ($usersData as $user) {
                                              ?>
                                              <option value="<?php echo $user['user_id'] ?>" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><?php echo $user['username'] ?></option>
                                          <?php } ?>
                                      </select>

                                  </div>
                              </div>
                              <div class="w-full lg:w-6/12 px-4">
                                  <div class="relative w-full mb-3">
                                      <label for="options-assignment" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                          Tags
                                      </label>
                                      <div onclick="showDropdownOptions('options-tag-form', 'arrow-up-tag-form', 'arrow-down-tag-form')" class="flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
                                          <span class="select-none">Chose tag</span>
                                          <svg id="arrow-down-tag-form" class="hidden w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                          <svg id="arrow-up-tag-form" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                                      </div>
                                      <select required name="tag[]" id="options-tag-form" class="hidden absolute z-10 w-48 py-2 mt-2 bg-white rounded-lg shadow-xl" multiple>
                                          <?php foreach ($tagData as $tag) { ?>
                                              <option value="<?php echo $tag["tag_id"] ?>" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><?php echo $tag["tag"] ?></option>
                                          <?php }?>
                                      </select>
                                  </div>
                              </div>
                              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                  Priority
                              </label>
                              <div class="flex-col justify-center container mx-auto mt-3">
                                  <div class="grid grid-cols-4 gap-3">
                                      <div>
                                          <input type="radio" id="done" name="priority" value="Low Priority" class="form-radio text-yellow-500">
                                          <label for="done" class="ml-2 text-gray-700">Low Priority</label>
                                      </div>
                                      <div>
                                          <input type="radio" id="doing" name="priority" value="Medium Priority" class="form-radio text-green-500">
                                          <label for="doing" class="ml-2 text-gray-700">Medium Priority</label>
                                      </div>
                                      <div>
                                          <input type="radio" id="todo" name="priority" value="High Priority" class="form-radio text-blue-500">
                                          <label for="todo" class="ml-2 text-gray-700">High Priority</label>
                                      </div>
                                      <div>
                                          <input type="radio" id="todo" name="priority" value="Urgent" class="form-radio text-blue-500">
                                          <label for="todo" class="ml-2 text-gray-700">Urgent</label>
                                      </div>



                                  </div>
                              </div>
                          </div>
                          <hr class="mt-6 border-b-1 border-blueGray-300">

                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                              Status
                          </label>
                          <div class="flex-col justify-center container mx-auto mt-3">
                              <div class="grid grid-cols-5 gap-4">
                                  <div>
                                      <input type="radio" id="todo" name="status" value="Open Ticket" class="form-radio text-blue-500">
                                      <label for="todo" class="ml-2 text-gray-700">Open Ticket</label>
                                  </div>

                                  <div>
                                      <input type="radio" id="doing" name="status" value="In Progress" class="form-radio text-green-500">
                                      <label for="doing" class="ml-2 text-gray-700">In Progress</label>
                                  </div>

                                  <div>
                                      <input type="radio" id="done" name="status" value="On Hold" class="form-radio text-yellow-500">
                                      <label for="done" class="ml-2 text-gray-700">On Hold</label>
                                  </div>

                                  <div>
                                      <input type="radio" id="done" name="status" value="Resolved" class="form-radio text-yellow-500">
                                      <label for="done" class="ml-2 text-gray-700">Resolved</label>
                                  </div>

                                  <div>
                                      <input type="radio" id="done" name="status" value="Closed" class="form-radio text-yellow-500">
                                      <label for="done" class="ml-2 text-gray-700">Closed</label>
                                  </div>
                              </div>
                          </div>


                          <hr class="mt-6 border-b-1 border-blueGray-300">
                          <div class="flex flex-wrap">
                              <div class="w-full lg:w-12/12 px-4">
                                  <div class="relative w-full mb-3">
                                      <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                          Description
                                      </label>
                                      <label>
                                          <textarea minlength="10" required name="description" placeholder="Describe Your Issue" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4"></textarea>
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="flex justify-between">
                              <div class="cancel border-2 border-red-600 rounded-lg px-3 py-2 text-gray-400 w-20 cursor-pointer hover:bg-red-600 hover:text-red-200">
                                  Cancel
                              </div>
                              <button name="save" class="border-2 border-yellow-600 rounded-lg px-3 py-2 text-yellow-400 cursor-pointer hover:bg-yellow-600 hover:text-yellow-200">
                                  Save changes
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>;