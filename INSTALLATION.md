## System requirements
- Node 14 / NPM 6 (higher and lower versions will fail)
- Git
- Composer 2
- PHP 7
- Docker Desktop 4

## Installation guide

1. Create a project root directory somewhere on your local machine, i.e. **northernbeat**.
2. Open a **terminal** (command-line) application and change the **working directory** to the newly created project directory.
3. If not already installed, install **yarn** and **gulp** globally

```
npm install --global yarn
npm install --global gulp-cli
```

4. In the project directory, **clone** the project repositories from Github (https://github.com/northernbeat) to the project folder:

```
git clone git@github.com:northernbeat/northernbeat.no.git ./northernbeat.no
git clone git@github.com:northernbeat/wordpress-nbeat-theme.git ./wordpress-nbeat-theme
git clone git@github.com:northernbeat/wordpress-nbeat-plugin.git ./wordpress-nbeat-plugin
```

5. Build the Northern Beat WordPress **theme** with yarn and gulp

```
cd wordpress-nbeat-theme
yarn install
gulp build
cd ..
```

Now, the subdirectories **/build** and **/dist** should exist under wordpress-nbeat-theme.
You can use the zip file under /dist to add/update the Northern Beat Theme on WordPress.

6. Build the Northern Beat WordPress **plugin** with yarn and gulp

```
cd wordpress-nbeat-plugin
yarn install
gulp build
cd ..
```

Now, the subdirectories **/build** and **/dist** should exist unger wordpress-nbeat-plugin.
You can use the zip file under /dist to add/update the Northern Beat Plugin on WordPress.

7. In nortnernbeat.no, create symlinks to the newly built theme and plugin.

```
cd nortnernbeat.no
rm ./src/NorthernBeatTheme
rm ./src/NorthernBeatPlugin
ln -s ../../wordpress-nbeat-theme/build/NorthernBeatTheme ./src
ln -s ../../wordpress-nbeat-plugin/build/NorthernBeatPlugin ./src
```

8. Create a Docker app to run the local development environment.

```
docker compose up
```

9. Open the newly created development site in your browser

```
http://localhost:8081/
```

10. Activate the Northern Beat WordPress Theme and Plugin in the WordPress admin UI.
