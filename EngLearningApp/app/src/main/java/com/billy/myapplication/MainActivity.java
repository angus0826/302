package com.billy.myapplication;

import android.app.AlertDialog;
import android.os.Bundle;

import com.billy.myapplication.data.DatabaseHandler;
import com.billy.myapplication.model.Task;
import com.billy.myapplication.ui.RecyclerViewAdapter;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;

import java.util.List;

public class MainActivity extends AppCompatActivity {

    private DatabaseHandler db;
    private AlertDialog.Builder builder;
    private AlertDialog alertDialog;
    private Button saveButton;
    private EditText enterTask;
    private EditText enterPLevel;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        db = new DatabaseHandler(this);
        List<Task> taskList = db.getAllTasks();

        // Setup recycler view
        RecyclerView recyclerView = findViewById(R.id.recyclerview);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        RecyclerViewAdapter recyclerViewAdapter = new RecyclerViewAdapter(this, taskList);
        recyclerView.setAdapter(recyclerViewAdapter);
        recyclerViewAdapter.notifyDataSetChanged();

        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                createPopDialog();
            }
        });

        //db.addTask(new Task(1,"kkk",11));
        //db.addTask(new Task(1,"kkk",11))
    }

    private void createPopDialog() {

        builder = new AlertDialog.Builder(this);
        View view = getLayoutInflater().inflate(R.layout.popup, null);

        enterTask = view.findViewById(R.id.enter_task);
        enterPLevel = view.findViewById(R.id.enter_priority_level);
        saveButton = view.findViewById(R.id.saveButton);

        builder.setView(view);
        alertDialog = builder.create();
        alertDialog.show();

        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (!enterTask.getText().toString().isEmpty()&&!enterPLevel.getText().toString().isEmpty()) {
                    saveTask(view);
                } else {
                    Snackbar.make(view, "Please input a task or Priority level", Snackbar.LENGTH_LONG).show();
                }

            }
        });
    }

    private void saveTask(View view) {

        String newTask = enterTask.getText().toString().trim();
        String newPriority = enterPLevel.getText().toString().trim();

        Task task = new Task();
        task.setTask(newTask);
        task.setPriority(Integer.parseInt(newPriority));

        db.addTask(task);

        Snackbar.make(view, "Task Saved", Snackbar.LENGTH_SHORT).show();

        // Refresh page
        alertDialog.dismiss();
        finish();
        startActivity(getIntent());
        overridePendingTransition(0, 0);

    }



    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
