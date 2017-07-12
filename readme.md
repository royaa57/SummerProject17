1. Open a Github account
2. Install git on your computer (Git For Windows on Windows)
3. Go to https://github.com/royaa57/SummerProject17
4. On the top left corner click on the Fork button

   Now you have a complete copy of the project on your Github account
  
5. Open Command Line (Terminal for Mac, Git Bash on Windows) and **go to the folder that you want your code to be**
6. Set your name and email
```shell
  $ git config --global user.name "Your Name"
  $ git config --global user.email "youremail@domain.com"
  ```
7. Click on the green button saying Clone or Download and copy the https URL. It looks like 
  ```html
  https://github.com/<your-user-name>/SummerProject17.git
  ```
8. Use the this URL in the the command below
```shell
$ git clone <url>
```

9. Your local folder now knows the forked repository. To see this you can type
```shell
$git remote -v
```
To be able to sync with the original repository we have to add that to our remotes too
```shell
$git remote add upstream https://github.com/royaa57/SummerProject17
```


Now you have a complte copy on your computer. You have to do the above just once, but the steps below should be done everytime you're working on the code.

1. Whenever you start working on a new feature make a new branch.
```shell
$git branch <new-branch>
```

Call it something meaningful. For example 
```shell
$ git branch search_box
```
or 
```shell
$ git branch user_profiles
```

2. Switch to the new branch
```shell
$git chekout <new-branch>
```

3. Work on your code, make new folders, add files, modify files. When you're ready add them to the staging area: 

```shell
$git add <name of the files>
```
or to add everything that is changed
```shell
$git add -A
```

4. Commit them. Try to use descriptive messages to explain what you did.

```shell
$git commit -m "<message>"
```

5. Push the changes to your own repository. 
```shell
$git push --set-upstream origin <new-branch>
```

6. Since other people may have contributed to the original repository, you should sync often and certainly before sending a pull request
```shell
$git fetch upstream
$git checkout master
$git merge upstream/master
```







