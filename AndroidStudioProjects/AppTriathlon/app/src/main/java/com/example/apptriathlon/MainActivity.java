package com.example.apptriathlon;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
// inclusion des packages nécessaires
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
public class MainActivity extends AppCompatActivity {

    // déclaration des variables
    private EditText editNom = null;
    private Button btnOK = null;
    private TextView txtMessage = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        // obtention des références sur les vues de l'activité
        editNom = (EditText)findViewById(R.id.editNom);
        btnOK = (Button)findViewById(R.id.boutonOK);
        txtMessage = (TextView)findViewById(R.id.message);
        // écouteur sur le bouton OK
        btnOK.setOnClickListener(EcouteurBouton);
    }
    public View.OnClickListener EcouteurBouton = new View.OnClickListener() {
        @Override
        public void onClick(View view) {
            txtMessage.setText("");
            if (editNom.getText().length()> 0) {
                Intent perfActivity = new Intent(MainActivity.this, Performance.class);
                startActivity(perfActivity);
            }
            else {
                AlertDialog.Builder boite = new AlertDialog.Builder(MainActivity.this);
                boite.setTitle("Information");
                boite.setMessage("Vous n'avez pas saisi votre nom !");
                boite.setPositiveButton("OK", new DialogInterface.OnClickListener(){
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        dialogInterface.dismiss();
                        editNom.requestFocus();
                    }
                });
                boite.show();
            }
        }
    };
}
