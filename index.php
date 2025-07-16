<?php
require_once('components/header-footer.php');
require_once('components/button.php');
require_once('components/input.php');

session_start();
PageHeader(); ?>

<main class="grid grid-cols-12 gap-3 m-5">
    <section class="col-span-6 rounded-lg p-3 border border-gray-300 bg-gray-500">
        <div class="space-y-8 max-w-md mx-auto">
            <form class="flex items-center gap-2" action="request/UploadRequest.php" method="POST" enctype="multipart/form-data">
                <?php TextInput('file', 'file_upload', 'file_upload') ?>
                <?php Button('submit', 'Upload to File to Parse') ?>
            </form>
        </div>
    </section>
    <section class="col-span-6 rounded-lg p-3 border border-gray-300 bg-gray-500 text-white">
        <div class="space-y-8">
            <h3 class="font-bold tracking-wider">Parse Result Data</h3>
            <?php
            if (isset($_SESSION['parsed_data']) && !empty($_SESSION['parsed_data'])) {
                // Display Download Button
                echo '<form action="request/DownloadParsedData.php" method="POST" class="inline">';
                        TextInput('hidden', 'parsed_data', 'parsed_data', htmlspecialchars(json_encode($_SESSION['parsed_data'])));
                        Button('submit', 'Download Parsed Data');
                echo '</form>';
                // Display Data
                foreach ($_SESSION['parsed_data'] as $line) {
                    echo '<div class="bg-gray-800 p-2 rounded mb-2 font-mono text-sm">' . htmlspecialchars($line) . '</div>';
                }
                unset($_SESSION['parsed_data']);
            } else {
                echo '<p class="text-gray-300">No data to display. Upload a file first.</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php PageFooter() ?>