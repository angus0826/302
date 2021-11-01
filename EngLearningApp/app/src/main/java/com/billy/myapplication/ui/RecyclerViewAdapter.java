package com.billy.myapplication.ui;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.billy.myapplication.MainActivity;
import com.billy.myapplication.R;
import com.billy.myapplication.data.DatabaseHandler;
import com.billy.myapplication.model.Task;
import com.google.android.material.snackbar.Snackbar;

import java.util.List;

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder> {

    private Context context;
    private List<Task> taskList;
    private AlertDialog.Builder builder;
    private AlertDialog dialog;
    private LayoutInflater inflater;

    public RecyclerViewAdapter(Context context, List<Task> taskList) {
        this.context = context;
        this.taskList = taskList;
    }

    @NonNull
    @Override
    public RecyclerViewAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View view = LayoutInflater.from(viewGroup.getContext())
                .inflate(R.layout.task_row, viewGroup, false);

        return new ViewHolder(view, context);
    }

    @Override
    public void onBindViewHolder(@NonNull RecyclerViewAdapter.ViewHolder viewHolder, int position) {

        Task task = taskList.get(position);

        //TODO: Set text for each task row
        viewHolder.taskName.setText(task.getTask());
        //viewHolder.taskName.setText(String.valueOf(task.getPriority()));
    }

    @Override
    public int getItemCount() {

        //TODO: return number of tasks
        return taskList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        //TODO: Complete the view holder

        TextView taskName;
        Button editButton;
        Button deleteButton;
        public ViewHolder(@NonNull View view, Context ctx) {
            super(view);
            context = ctx;

            //TODO: Complete the view holder and set listeners


            taskName = view.findViewById(R.id.task_name);
            editButton = view.findViewById(R.id.editButton);
            deleteButton = view.findViewById(R.id.deleteButton);
            editButton.setOnClickListener(this);
            deleteButton.setOnClickListener(this);


        }
        @Override
        public void onClick(View v) {

            int position;
            position = getAdapterPosition();
            Task task = taskList.get(position);

            switch (v.getId()) {
                case R.id.editButton:
                    editTask(task);
                    break;
                case R.id.deleteButton:
                    deleteTask(task.getId());
                    break;
            }

        }


        private void deleteTask(final int id) {
            DatabaseHandler databaseHandler = new DatabaseHandler(context);
            //TODO: Delete task
            databaseHandler.deleteTask(id);

            taskList.remove(getAdapterPosition());
            notifyItemRemoved(getAdapterPosition());

        }

        private void editTask(final Task newTask) {

            builder = new AlertDialog.Builder(context);
            inflater = LayoutInflater.from(context);
            final View view = inflater.inflate(R.layout.popup, null);

            Button saveButton;
            final EditText enterTask;
            final EditText enterPLevel;

            enterTask = view.findViewById(R.id.enter_task);
            enterPLevel = view.findViewById(R.id.enter_priority_level);
            saveButton = view.findViewById(R.id.saveButton);

            enterTask.setText(newTask.getTask());
            //if(newTask.getPriority() >= 1)
            enterPLevel.setText(Integer.toString(newTask.getPriority()));


            builder.setView(view);
            dialog = builder.create();
            dialog.show();

            saveButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    // Update Tasks
                    DatabaseHandler databaseHandler = new DatabaseHandler(context);

                    //newTask.setTask(enterTask.getText().toString());
                    //newTask.setPriority_leve(Integer.parseInt(enterPLevel.getText().toString()));

                    if (!enterTask.getText().toString().isEmpty()) {

                        //TODO: Update task
                        newTask.setTask(enterTask.getText().toString());
                        newTask.setPriority(Integer.parseInt(enterPLevel.getText().toString()));
                        notifyItemChanged(getAdapterPosition(), newTask);

                        databaseHandler.updateTask(newTask);
                        Intent intent =  new Intent(context, MainActivity.class);

                        context.startActivity(intent);


                    } else {
                        Snackbar.make(view, "Please enter task name or Priority level", Snackbar.LENGTH_SHORT)
                                .show();
                    }

                    dialog.dismiss();

                }
            });
        }


    }
}
