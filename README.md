TO DOWNLOAD/CLONE THIS:

To clone a repository from GitHub to another computer, you need to follow these steps:

### 1. Ensure Git is Installed

First, ensure that Git is installed on the other computer. If it isn't, download and install it from [git-scm.com](https://git-scm.com/).

### 2. Clone the Repository

You can clone the repository using the following steps:

1. **Open Terminal**: Open the Terminal (or Command Prompt/PowerShell on Windows) on the other computer.
2. **Navigate to the Desired Directory**: Use the `cd` command to navigate to the directory where you want to clone the repository. For example:

   ```
   cd path/to/desired/directory
   ```

3. **Clone the Repository**: Use the `git clone` command followed by the repository URL.  `YOUR_GITHUB_USERNAME` = https://github.com/oladejiafo/coop-software.git

   ```
   git clone https://github.com/oladejiafo/coop-software.git
   ```

### Example Steps

Here’s a complete example assuming your repository URL is https://github.com/oladejiafo/coop-software.git` and you want to clone it to a directory called `projects`:

1. **Open Terminal**.
2. **Navigate to the desired directory**:

   ```sh
   cd /path/to/projects
   ```

3. **Clone the repository**:

   ```sh
   git clone https://github.com/YOUR_GITHUB_USERNAME/YOUR_REPOSITORY_NAME.git
   ```

### Verifying the Clone

After the cloning process is complete, navigate into the cloned repository directory to ensure that all files have been cloned correctly:

```sh
cd YOUR_REPOSITORY_NAME
ls
```

This will list all the files and directories in the cloned repository.

### Using SSH Instead of HTTPS

If you prefer to use SSH for cloning the repository (and have your SSH keys set up with GitHub), the clone command would look like this:

```sh
git clone git@github.com:YOUR_GITHUB_USERNAME/YOUR_REPOSITORY_NAME.git
```

This method is often preferred for authenticated operations since it doesn’t require you to enter your GitHub username and password every time.

By following these steps, you should be able to clone your repository to another computer and work on your project from there.
