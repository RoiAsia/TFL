<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>TFL</title>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                theme: {
                    extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                    }
                }
                }
            </script>

        </head>
        <body class="h-screen">
            <form>
                <div class="w-full flex justify-center">
                    <div class="w-full min-h-screen h-auto p-5 md:w-1/2">
                        <div class="mt-5">
                            <label class="mt-16">Full Name</label>
                            <div class="border my-2">
                                <input type="email" class="border w-full p-1"/>
                            </div>
                        </div>
                        <div class="mt-3 grid grid-cols-2 space-x-4">
                            <div>
                                <label class="mt-16">Department</label>
                                <div class="border my-2">
                                    <select class="border w-full p-1">
                                        <option>Management Information System</option>
                                        <option>Marketing</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="mt-16">Date</label>
                                <div class="border my-2">

                                    <?php
                                            date_default_timezone_set('Asia/Manila');
                                    ?>

                                    <input type="datetime-local" name="datetime" class="border w-full p-1" value="<?php echo date('Y-m-d\TH:i'); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-9">
                            <div class="grid grid-cols-4 gap-4 text-center">
                                <p>ITEM</p>
                                <p>QUANTITY</p>
                                <p>BRAND</p>
                                <p>COLOR</p>
                            </div>
                        </div>
                        <div class="my-1">
                            <div id="dynamicRows">
                                <div class="grid grid-cols-4 gap-4 mt-3 mb-5">
                                    <input type="text" class="border w-full p-1"/>
                                    <input type="number" class="border w-full p-1" min="0" id="numberInput" />
                                    <input type="text" class="border w-full p-1"/>
                                    <input type="text" class="border w-full p-1"/>
                                </div>
                            </div>
                            <div class="my-4 flex justify-between">
                                <button type="button" id="addRow" class="bg-blue-500 text-white p-2 rounded">Add Row</button>
                                <button type="button" id="removeRow" class="bg-red-500 text-white p-2 rounded" disabled>Remove Row</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>

                document.querySelector('#dynamicRows').addEventListener('input', function(e) {
                    if (e.target.type === 'number' && e.target.value < 0) {
                        e.target.value = 0;
                    }
                });

                document.getElementById('addRow').addEventListener('click', function() {
                    const dynamicRows = document.getElementById('dynamicRows');
                    const newRow = document.createElement('div');
                    newRow.classList.add('grid', 'grid-cols-4', 'gap-4', 'my-5');
                    newRow.innerHTML = `
                        <input type="text" class="border w-full p-1"/>
                        <input type="number" class="border w-full p-1" min="0" />
                        <input type="text" class="border w-full p-1"/>
                        <input type="text" class="border w-full p-1"/>
                    `;
                    dynamicRows.appendChild(newRow);
                    document.getElementById('removeRow').disabled = false;
                });

                document.getElementById('removeRow').addEventListener('click', function() {
                    const dynamicRows = document.getElementById('dynamicRows');
                    const rows = dynamicRows.getElementsByClassName('grid');
                    if (rows.length > 1) {
                        dynamicRows.removeChild(rows[rows.length - 1]);
                    }

                    if (rows.length === 1) {
                        document.getElementById('removeRow').disabled = true;
                    }
                });

            </script>
        </body>
    </html>