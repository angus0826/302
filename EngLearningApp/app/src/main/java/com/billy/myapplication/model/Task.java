package com.billy.myapplication.model;

public class Task {

    private int id;
    private String task;
    private int priority;


    public Task(){}

    public Task(int id, String task){
        this.id = id;
        this.task = task;
    }
    public Task(int id, String task, int priority){
        this.id = id;
        this.task = task;
        this.priority = priority;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTask() {
        return task;
    }

    public void setTask(String task) {
        this.task = task;
    }

    public int getPriority() {
        return priority;
    }

    public void setPriority(int priority) {
        this.priority = priority;
    }
}
