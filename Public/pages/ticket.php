<?php
require_once("../../app/bootstrap.php");
require_once("../../app/controllers/ticket_display.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css'>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Ticket Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="p-8">
<div>
<a href="../index.php" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
    </svg>

    Back Home
</a>

    <div class="bg-white p-4 flex justify-center items-center flex-wrap">
    <?php if($ticketData["priority"] == "Medium Priority") {?>
  <span class="inline-flex items-center m-2 px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full text-sm font-semibold text-gray-600">
	<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
	<span class="ml-1">
	  <?php echo $ticketData["priority"] ?>
	</span>
  </span>
        <?php } else if($ticketData["priority"] == "Urgent") {?>
        <span class="inline-flex items-center m-2 px-3 py-1 bg-red-200 hover:bg-red-300 rounded-full text-sm font-semibold text-red-600">
	<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
	<span class="ml-1">
	  <?php echo $ticketData["priority"] ?>
	</span>
  </span>
    <?php } else if($ticketData["priority"] == "High Priority") {?>
        <span class="inline-flex items-center m-2 px-3 py-1 bg-yellow-200 hover:bg-yellow-300 rounded-full text-sm font-semibold text-yellow-600">
	<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
	<span class="ml-1">
        <?php echo $ticketData["priority"] ?>
	</span>
  </span>
    <?php } else if($ticketData["priority"] == "Low Priority") {?>
        <span class="inline-flex items-center m-2 px-3 py-1 bg-blue-200 hover:bg-blue-300 rounded-full text-sm font-semibold text-blue-600">
	<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
	<span class="ml-1">
        <?php echo $ticketData["priority"] ?>
	</span>
  </span>
        <?php } ?>
    </div>
</div>
<main class="mt-10 p-8">
    <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
            <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                <?php echo $ticketData["subject"] ?>
            </h2>
            <a
                href="#"
                class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
            >
                <?php echo $ticketData["tag"] ?>
            </a>
            <p class="py-2 text-green-700 items-center justify-center mb-2">
                by <?php echo $ticketData["username"] ?>
            </p>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            <p class="pb-6"><?php echo $ticketData["description"] ?></p>

        </div>

        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
            <!-- Stylish Comment Container -->
            <div class="p-2 border-t border-b md:border md:rounded bg-gray-100 shadow-md">
                <!-- User Details and Comment Content Section -->
                <div  id="comment-section" class="flex-col items-center mb-2">

                </div>
                <!-- Comment Input Section -->
                <form id="commentForm" class="flex" method="post" action="../../app/controllers/comment.php">
                    <input type="text" id="comment" name="comment" class="p-2 flex-1 border rounded focus:outline-none focus:border-yellow-500"
                           placeholder="Add a comment...">
                    <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id'] ?> " name="user_id">
                    <input type="hidden" id="ticket_id" value="<?php echo $ticketData['ticket_id'] ?>" name="ticket_id">
                    <button name="submit" class="ml-2 px-4 py-2 bg-yellow-500 text-gray-100 rounded hover:bg-yellow-600 transition duration-300">
                        Submit
                    </button>
                </form>
            </div>
        </div>



    </div>
</main>


<script src="../script/comments.js"></script>
</body>
</html>