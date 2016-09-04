# Worksnaps API client - Symfony Bundle

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/ad1f9999-b1f1-4756-8589-276337f06716/big.png)](https://insight.sensiolabs.com/projects/ad1f9999-b1f1-4756-8589-276337f06716)

## Install the Bundle
```composer require makarenko/worksnaps-bundle```

## Enable the Bundle
```
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Umbrella\WorksnapsBundle\WorksnapsBundle(),
        );

        // ...
    }

    // ...
}
```

## Configure the Bundle
```
# app/config/config.yml
worksnaps:
    api_key: "YOUR API KEY HERE"
```

## Working in code

### Project API
#### Get all projects
``` $allProjects = $this->get('umbrella.worksnaps')->getProjects();```
#### Get project by ID
``` $project = $this->get('umbrella.worksnaps')->getProject( $projectId );```

### Task API
#### Get tasks in project
``` $tasks = $this->get('umbrella.worksnaps')->getTasks( $projectId );```
#### Get task
``` $task = $this->get('umbrella.worksnaps')->getTask( $projectId, $taskId );```

### User Assignment API
#### Get users from project
``` $users = $this->get('umbrella.worksnaps')->getUsersFromProject( $projectId );```
#### Get user from project
``` $user = $this->get('umbrella.worksnaps')->getUserFromProject( $projectId, $userId );```

### User Account API
#### Get my user
``` $myUser = $this->get('umbrella.worksnaps')->getMyUser();```
#### Get users
``` $users = $this->get('umbrella.worksnaps')->getUsers();```
#### get user
``` $user = $this->get('umbrella.worksnaps')->getUser( $userId );```

### Task Assignment API
#### Get tasks assignments in a project
``` $tasksInProject = $this->get('umbrella.worksnaps')->getTasksFromProject( $projectId );```
#### Get task assignment in a project
``` $taskInProject = $this->get('umbrella.worksnaps')->getTaskFromProject( $projectId, $taskId );```

### Time Entry API
#### Get time entries in the specified project
``` $timeEntries = $this->get('umbrella.worksnaps')->getTimeEntries( $projectId, array( $userId ), $fromTimestamp, $toTimestamp );```
#### Get time entries of the specified user in the specified project
``` $timeEntriesForUser = $this->get('umbrella.worksnaps')->getTimeEntriesForUser( $projectId, $userId, $fromTimestamp, $toTimestamp );```
#### Get the URL of full resolution screenshot of a time entry
``` $fullUrl = $this->get('umbrella.worksnaps')->getScreenshot( $projectId, $timeEntryId );```
#### Get time entry
``` $timeEntry = $this->get('umbrella.worksnaps')->getTimeEntry( $projectId, $timeEntryId );```

### Report API
``` $report = $this->get('umbrella.worksnaps')->getReport( $projectId, $fromTimestamp, $toTimestamp, [ $userId ] );```
