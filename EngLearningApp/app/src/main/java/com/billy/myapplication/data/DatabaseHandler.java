package com.billy.myapplication.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import com.billy.myapplication.R;
import com.billy.myapplication.Util;
import com.billy.myapplication.model.Task;

import java.util.ArrayList;
import java.util.List;

public class DatabaseHandler extends SQLiteOpenHelper {

    private final Context context;

    public DatabaseHandler(@Nullable Context context) {
        super(context, Util.DB_NAME, null, Util.DB_VERSION);
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        //TODO: Create Table
        String CREATE_CONTACT_TABLE = "CREATE TABLE " + Util.TABLE_NAME + "("
                + Util.KEY_ID + " INTEGER PRIMARY KEY,"
                + Util.KEY_TASK_ITEM + " TEXT,"
                + Util.KEY_PRIORITY_LEVEL + " INTEGER"
                + ")";

        db.execSQL(CREATE_CONTACT_TABLE);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        //TODO: Drop and Create Table again
        String DROP_TABLE = String.valueOf(R.string.db_drop);
        db.execSQL(DROP_TABLE, new String[]{Util.DB_NAME});

        //Create a table again
        onCreate(db);

    }

    // CRUD operations
    public void addTask(Task task) {

        //TODO: Insert row
        SQLiteDatabase db = this.getWritableDatabase();

        ContentValues values = new ContentValues();
        values.put(Util.KEY_TASK_ITEM, task.getTask());
        values.put(Util.KEY_PRIORITY_LEVEL,task.getPriority());

        //long id = db.insert(Util.TABLE_NAME, null, values);
        db.insert(Util.TABLE_NAME, null, values);
        db.close();

        //return (int) id;

    }


    // Get all tasks
    public List<Task> getAllTasks() {

        //TODO: Read all rows
        List<Task> taskList = new ArrayList<>();

        SQLiteDatabase db = this.getReadableDatabase();

        // Select all taskLists
        String selectAll = "SELECT * FROM " + Util.TABLE_NAME +" ORDER BY "+Util.KEY_PRIORITY_LEVEL+" DESC";
        //+ " ORDER BY "+ Util.KEY_PRIORITY_LEVEL +  " ASC"
        Cursor cursor = db.rawQuery(selectAll, null);

        // Loop all the data
        if (cursor.moveToFirst()) {
            do {
                Task task = new Task(
                        Integer.parseInt(cursor.getString(0)),
                        cursor.getString(1)
                        ,Integer.parseInt(cursor.getString(2))
                );

                // add the current contact to our list
                taskList.add(task);
            } while (cursor.moveToNext());
        }

        return taskList;

    }

    // Update task
    public void updateTask(Task task) {

        //TODO: Update row
        SQLiteDatabase db = this.getWritableDatabase();

        ContentValues values = new ContentValues();
        values.put(Util.KEY_TASK_ITEM, task.getTask());
        values.put(Util.KEY_PRIORITY_LEVEL, task.getPriority());

        // Update the row
        //SQL: update(tablename, values, where id = 1)
        db.update(Util.TABLE_NAME, values, Util.KEY_ID + "=?",
                new String[]{String.valueOf(task.getId())});
    }

    // Delete task
    public void deleteTask(int id) {

        //TODO: Delete row
        SQLiteDatabase db = this.getWritableDatabase();
        db.delete(Util.TABLE_NAME, Util.KEY_ID + "=?",
                new String[]{String.valueOf(id)});
        db.close();

    }

}
