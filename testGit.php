<!doctype HTML>

<head>
    <title>testGit</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        span {
            font-weight: bold;
        }
    </style>


</head>


<body>

    <h1>Intro to PHP</h1>
    <h3>Testing Git Repo</h3>

    <h4>Define the following Git related terms:</h4>
    <p>a. <span>version control software</span> - class of systems responsible for managing
        changes to computer programs, documents, websites or other collections
        of information.
    </p>
    
    <p>b. <span>add</span> - git command that adds a change in the working directory to the staging
        area; telling git you want to include updates or changes to a file in the next
        commit. Changes to the files are not saved until you run commit.
    </p>

    <p>c. <span>commit</span> - git command that is used to save your changes to files in your
        local repository. This command only saves a new commit object in the local
        git repo.
    </p>

    <p>d. <span>push</span> - git command that is used to upload local repo content to a remote
        repo.
    </p>

    <p>e. <span>pull</span> - git command that is used to fetch and download content from a remote
        repo and update the local repo to match the content.
    </p>

    <p>f. <span>clone</span> - git command line which is used to target an existing repo and create
        a clone of the target repo.
    </p>

    <h4>Use PHP to display name below:</h4>

    <?php $myName = "Will Hedgecock"?>

    <p>Hello, my name is <?php echo $myName ?></p>

</body>

</html>