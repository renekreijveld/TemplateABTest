Template Style A/B Test plugin
==============================

This Joomla 3.x system plugin allows you to perform A/B tests for template styles.
Within the plugin configuration you can choose 2 template styles. Hint: don't choose the same styles ;-)

When a visitor comes to your site for the first time or after the previous session was expired, the plugin randomly chooses one of the two configured template styles.
It then shows the website in that template style and maintains this during the visit session by setting a session variable with the chosen template style.

Use <a href="https://analytics.google.com" target="_blank">Google Analytics</a> or <a href="https://piwik.org" target="_blank">Piwik</a> to measure the performance of your template styles.

**Warning:** if this plugin is active, *all* assigned template styles are ignored! All your pages will be show in the chosen template style.

# Installation instructions:
* Download the installer file from the [releases page](https://github.com/renekreijveld/TemplateABTest/releases).
* Install the plugin through your Joomla extension installer.
* Go to the plugin configuration. Hint: search for "template" in your plugins list.
* Publish the plugin.
* In the Options tab choose the two template styles you wish to test.
