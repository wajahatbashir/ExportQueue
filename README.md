# WB_ExportQueue Module

## Overview

The `WB_ExportQueue` module for Magento 2 provides a system for handling and processing export operations through the Magento cron queue observer system. This module is designed to manage export tasks efficiently, ensuring that they are processed asynchronously and reliably within a queue.

## Features

- **Queued Export Processing:** Export operations are added to a queue and processed asynchronously, ensuring that large exports do not impact the performance of the Magento store.
- **Cron-Based Execution:** The module leverages Magento's cron system to process the export queue at regular intervals.
- **Robust Error Handling:** Includes error logging and retry mechanisms to handle failures during export processing.
- **Customizable via Admin Configuration:** Provides configuration options to control the export queue processing.

## Installation

### 1. Upload the Module

Upload the module files to the `app/code/WB/ExportQueue` directory of your Magento 2 installation.

### 2. Enable the Module

Enable the module by running the following commands:

```bash
php bin/magento module:enable WB_ExportQueue
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
```

### 3. Verify Installation

To verify the module is installed correctly, run the following command:

```bash
php bin/magento module:status WB_ExportQueue
```

You should see the module listed as enabled.

## Configuration

The module can be configured via the Magento admin panel under `Stores > Configuration > WB Export Queue`. Configuration options may include settings for the frequency of the cron job, error handling policies, and logging preferences.

## Usage

### Export Queue Processing

The `WB_ExportQueue` module processes export operations that are added to a queue. The module's cron job is responsible for checking the queue at regular intervals and processing any pending export tasks.

### Manual Queue Processing

If you need to manually trigger the export queue processing, you can run the following command:

```bash
php bin/magento queue:consumers:start exportProcessor
```

### Logging

The module logs export processing activities, including any errors encountered during the export process. Logs can be found in the standard Magento log files located in `var/log/`.

## Troubleshooting

### Common Issues

- **Export Not Processed:** Ensure that the Magento cron jobs are running correctly. You can check the cron job status with the following command:

  ```bash
  php bin/magento cron:run
  ```

- **Errors During Export Processing:** Review the logs in `var/log/` for any error messages related to the export queue. This will provide insights into what went wrong.

## Uninstallation

To uninstall the module, run the following commands:

```bash
php bin/magento module:disable WB_ExportQueue
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
```

Then, manually remove the module files from the `app/code/WB/ExportQueue` directory.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue if you find a bug or have a feature request.

## License

This module is open-source and licensed under the [MIT License](LICENSE).
